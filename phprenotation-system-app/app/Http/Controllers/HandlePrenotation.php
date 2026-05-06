<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Collection;


class HandlePrenotation extends Controller
{
    private function sendmail(String $email, Collection $booking)
    {
        Mail::to($email)->send(new BookingConfirmation($booking));
    }

    public function index()
    {
        // Recuperiamo le date uniche dalla tabella 'giornata'
        $giornate = DB::table('giornata')
            ->select('data')
            ->where('posti_liberi', '>', 0)
            ->groupBy('data')
            ->orderBy('data')
            ->get()
            ->map(function ($item) {
                $date = Carbon::parse($item->data);
                return [
                    'raw' => $item->data,
                    'formatted' => $this->formatDateItalian($date),
                    'is_past' => $date->isPast() && !$date->isToday()
                ];
            });
        return Inertia::render('Welcome', [
            'giornateIniziali' => $giornate
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
            12 => 'DICEMBRE'
        ];

        return $date->day . ' - ' . $mesi[$date->month] . ' - ' . $date->year;
    }

    public function selezione(Request $request)
    {
        $request->session()->put('selected_date', $request->input('date'));
        $dataScelta = $request->input('date');

        if ($dataScelta === null) {
            $request->session()->forget(['selected_date']);
            return back()->with('error', 'Nessuna data selezionata.');
        }

        $orariDisponibili = DB::table('giornata')
            ->where('data', $dataScelta)->where('posti_liberi', '>', 0)
            ->orderBy('orario')
            ->get();

        if ($orariDisponibili->isEmpty()) {
            $request->session()->forget(['selected_date']);
            return back()->with('error', 'Nessun orario disponibile per questa data.');
        }

        return Inertia::render('Selection', [
            'dataScelta' => $dataScelta,
            'orari' => $orariDisponibili
        ]);
    }

    public function prenota(Request $request)
    {
        $dataScelta = $request->session()->get('selected_date');
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
            'name' => $nome . ' ' . $cognome,
            'date' => $dataScelta,
            'time' => $orarioScelto,
            'guests' => $posti
        ]);

        if ($dataScelta === null || $orarioScelto === null || $nome === null || $cognome === null || $email === null || $telefono === null || $posti === null) {
            $request->session()->forget(['selected_date', 'orario', 'nome', 'cognome', 'email', 'telefono', 'posti']);
            return back()->with('error', 'Compila tutti i campi.');
        }

        if (DB::table('giornata')->where('data', $dataScelta)->where('orario', $orarioScelto)->value('posti_liberi') == 0) {
            $request->session()->forget(['selected_date', 'orario', 'nome', 'cognome', 'email', 'telefono', 'posti']);
            return back()->with('error', 'Il numero di posti deve essere almeno 1.');
        }

        // Salva la prenotazione
        try {
            DB::table('prenotazione')->insert([
                'nome' => $nome,
                'cognome' => $cognome,
                'email' => $email,
                'numero' => $telefono,
                'id_giornata' => DB::table('giornata')
                    ->where('data', $dataScelta)
                    ->where('orario', $orarioScelto)
                    ->value('id_giornata'),
                'posti_prenotati' => $posti,
            ]);
        } catch (Throwable $caught) {
            $request->session()->forget(['selected_date', 'orario', 'nome', 'cognome', 'email', 'telefono', 'posti']);
            return back()->with('error', $caught->getMessage());
        }


        // Riduci il numero di posti liberi
        try {
            DB::table('giornata')
                ->where('data', $dataScelta)
                ->where('orario', $orarioScelto)
                ->decrement('posti_liberi');
        } catch (Throwable $caught) {
            $request->session()->forget(['selected_date', 'orario', 'nome', 'cognome', 'email', 'telefono', 'posti']);
            return back()->with('error', $caught->getMessage());
        }



        $this->sendmail($email, $booking);


        // Puliamo la sessione dopo la prenotazione
        $request->session()->forget(['selected_date', 'orario', 'nome', 'cognome', 'email', 'telefono', 'posti']);

        return Inertia::render('Confirmation', [
            'booking' => $booking
        ]);
    }
}
