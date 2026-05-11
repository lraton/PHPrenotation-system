<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Throwable;

class HandlePrenotation extends Controller
{
    private function sendmail(string $email, Collection $booking)
    {
        try {
            Mail::to($email)->queue(new BookingConfirmation($booking, false));
            Mail::to('noreply@phpprenotationsystem.com')->queue(new BookingConfirmation($booking, true)); // Invia una copia a un indirizzo di log per monitoraggio
        } catch (Throwable $caught) {
            return redirect()->route('home')->withErrors(['error' => 'Prenotazione effettuata, ma non siamo riusciti a inviare l\'email di conferma.' . $caught->getMessage()]);
        }
    }

    public function index()
    {
        // Recuperiamo le date uniche dalla tabella 'giornata'
        $giornate = DB::table('giornata')
            ->select('data')
            ->where('libera', '>', 0)
            ->groupBy('data')
            ->orderBy('data')
            ->get()
            ->map(function ($item) {
                $date = Carbon::parse($item->data);

                return [
                    'raw' => $item->data,
                    'formatted' => $this->formatDateItalian($date),
                    'is_past' => $date->isPast() && ! $date->isToday(),
                ];
            });

        return Inertia::render('Welcome', [
            'giornateIniziali' => $giornate,
        ]);
    }

    private function formatDateItalian($date)
    {
        $mesi = [
            1 => 'GENNAIO',
            2 => 'FEBBRAIO',
            3 => 'MARZO',
            4 => 'APRILE',
            5 => 'MAGGIO',
            6 => 'GIUGNO',
            7 => 'LUGLIO',
            8 => 'AGOSTO',
            9 => 'SETTEMBRE',
            10 => 'OTTOBRE',
            11 => 'NOVEMBRE',
            12 => 'DICEMBRE',
        ];

        return $date->day . ' - ' . $mesi[$date->month] . ' - ' . $date->year;
    }

    public function selezione(Request $request)
    {
        $request->session()->put('selected_date', $request->input('date'));
        $dataScelta = $request->input('date');  

        if ($dataScelta === null || ! DB::table('giornata')->where('data', $dataScelta)->exists() || ! DB::table('giornata')->where('data', $dataScelta)->where('libera', 1)->exists() || $dataScelta < Carbon::today()->toDateString()) {
            $request->session()->forget(['selected_date']);

            return redirect()->route('home')->withErrors(['error' => 'Nessuna data selezionata.']);
        }

        $orariDisponibili = DB::table('giornata')
            ->where('data', $dataScelta)->where('libera', '>', 0)
            ->orderBy('orario')
            ->get();

        if ($orariDisponibili->isEmpty()) {
            $request->session()->forget(['selected_date']);

            return redirect()->route('home')->withErrors(['error' => 'Nessun orario disponibile per questa data.']);
        }

        return Inertia::render('Selection', [
            'dataScelta' => $dataScelta,
            'orari' => $orariDisponibili,
        ]);
    }

    public function prenota(Request $request)
    {
        $dataScelta = $request->session()->get('selected_date');
        if ($dataScelta === null) {
            return redirect()->route('home')->withErrors(['error' => 'Nessuna data selezionata.']);
        }

        $request->session()->put('selected_date', $dataScelta);
        $request->session()->put('orario', $request->input('orario'));
        $orarioScelto = $request->session()->get('orario');
        $request->session()->put('nome', $request->input('nome'));
        $nome = $request->session()->get('nome');
        $request->session()->put('cognome', $request->input('cognome'));
        $cognome = $request->session()->get('cognome');
        $request->session()->put('email', $request->input('email'));
        $email = $request->session()->get('email');
        $request->session()->put('telefono', $request->input('telefono'));
        $telefono = $request->session()->get('telefono');
        $request->session()->put('posti', $request->input('posti'));
        $posti = $request->session()->get('posti');

        $booking = collect([
            'cancel_token' => Str::random(80),
            'qr_token' => Str::random(80),
            'name' => $nome . ' ' . $cognome,
            'date' => $dataScelta,
            'time' => $orarioScelto,
            'guests' => $posti,
        ]);

        // Validazione dei dati
        if ($orarioScelto === null || $nome === null || $cognome === null || $email === null || $telefono === null || $posti === null) {
            $request->session()->forget(['selected_date', 'orario', 'nome', 'cognome', 'email', 'telefono', 'posti']);

            return back()->withErrors(['error' => 'Compila tutti i campi.']);
        }

        // Controlla se ci sono posti disponibili per la data e l'orario scelti
        if (DB::table('giornata')->where('data', $dataScelta)->where('orario', $orarioScelto)->value('libera') == 0) {
            $request->session()->forget(['selected_date', 'orario', 'nome', 'cognome', 'email', 'telefono', 'posti']);

            return back()->withErrors(['error' => 'Il numero di posti deve essere almeno 1.']);
        }

        // Salva la prenotazione
        try {
            DB::table('prenotazione')->insert([
                'nome' => $nome,
                'cognome' => $cognome,
                'email' => $email,
                'telefono' => $telefono,
                'id_giornata' => DB::table('giornata')
                    ->where('data', $dataScelta)
                    ->where('orario', $orarioScelto)
                    ->value('id_giornata'),
                'posti_prenotati' => $posti,
                'cancel_token' => $booking->get('cancel_token'), // Token univoco per la cancellazione
                'qr_token' => $booking->get('qr_token'), // Token univoco per il QR code
            ]);
        } catch (Throwable $caught) {
            $request->session()->forget(['selected_date', 'orario', 'nome', 'cognome', 'email', 'telefono', 'posti']);

            return back()->withErrors(['error' => $caught->getMessage()]);
        }

        // Riduci il numero di posti liberi
        try {
            DB::table('giornata')
                ->where('data', $dataScelta)
                ->where('orario', $orarioScelto)
                ->decrement('libera');
        } catch (Throwable $caught) {
            DB::table('prenotazione')
                ->where('cancel_token', $booking->cancel_token)
                ->delete();
            $request->session()->forget(['selected_date', 'orario', 'nome', 'cognome', 'email', 'telefono', 'posti']);

            return back()->withErrors(['error' => 'Si è verificato un errore durante la cancellazione della prenotazione.']);
        }

        // Invia l'email di conferma, ma da errore acnhe se la invia
        $this->sendmail($email, $booking);

        // Puliamo la sessione dopo la prenotazione
        $request->session()->forget(['selected_date', 'orario', 'nome', 'cognome', 'email', 'telefono', 'posti']);

        return redirect()->route('home')->with('success', 'Prenotazione effettuata con successo per il ' . $dataScelta . ' alle ' . $orarioScelto . '!');
    }

    public function cancellaPrenotazione(Request $request)
    {
        $token = $request->query('token');

        if (! $token) {
            return redirect()->route('home')->withErrors(['error' => 'Token di cancellazione mancante.']);
        }

        $prenotazione = DB::table('prenotazione')->where('cancel_token', $token)->first();

        if (! $prenotazione) {
            return redirect()->route('home')->withErrors(['error' => 'Token di cancellazione non valido.']);
        }

        try {
            DB::table('prenotazione')->where('id_prenotazione', $prenotazione->id_prenotazione)->delete();
            DB::table('giornata')->where('id_giornata', $prenotazione->id_giornata)->increment('libera');
        } catch (Throwable $caught) {
            return redirect()->route('home')->withErrors(['error' => 'Si è verificato un errore durante la cancellazione della prenotazione.']);
        }

        return redirect()->route('home')->with('success', 'Prenotazione cancellata con successo.');
    }
}
