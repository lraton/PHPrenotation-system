<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;


class Dashboard extends Controller
{

    private function generateDateRange($startDate, $endDate)
    {
        $dates = [];
        $currentDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        while ($currentDate <= $endDate) {
            $dates[] = date('Y-m-d', $currentDate);
            $currentDate = strtotime('+1 day', $currentDate);
        }

        return $dates;
    }

    public function index(Request $request)
    {
        $prenotazioni = DB::table('prenotazione')
            ->join('giornata', 'prenotazione.id_giornata', '=', 'giornata.id_giornata')
            ->select('prenotazione.*', 'giornata.data', 'giornata.orario', 'prenotazione.id_prenotazione', 'prenotazione.telefono', 'prenotazione.posti_prenotati')
            ->orderBy('giornata.data', 'desc')
            ->get();

        return view('dashboard', ['prenotazioni' => $prenotazioni, 'username' => $request->session()->get('username')]);
    }

    public function addGiornata(Request $request)
    {
        $data = $request->input('data');
        $orario = $request->input('orario');
        $datainizio = $request->input('datainizio');
        $datafine = $request->input('datafine');
        $orari = $request->input('orari'); // Array di orari selezionati
        if ($orari && !is_array($orari)) {
            $orari = [$orari];
        }

        // Validazione dei dati
        if (!$data || !$orario) {
            if (!$datainizio || !$datafine || empty($orari)) {

                return redirect()->back()->withErrors(['message' => 'Date e orari sono obbligatori. ' . $data . ' ' . $orario . ' ' . $datainizio . ' ' . $datafine . ' ' . json_encode($orari)]);
            } else {
                foreach ($orari as $o) {
                    foreach ($this->generateDateRange($datainizio, $datafine) as $date) {
                        if (!DB::table('giornata')->where('data', $date)->where('orario', $o)->exists()) {
                            //return redirect()->back()->withErrors(['message' => 'Il giorno ' . $date . ' con questo orario ' . $o . ' esiste già.']);
                            // Aggiungi la nuova giornata al database
                            DB::table('giornata')->insert([
                                'data' => $date,
                                'orario' => $o,
                                'libera' => 1, // 1 disponibile, 0 non disponibile
                            ]);
                        }
                    }
                }
            }
        } else {
            if (DB::table('giornata')->where('data', $data)->where('orario', $orario)->exists()) {
                return redirect()->back()->withErrors(['message' => 'Il giorno ' . $data . ' con questo orario ' . $orario . ' esiste già.']);
            }

            // Aggiungi la nuova giornata al database
            DB::table('giornata')->insert([
                'data' => $data,
                'orario' => $orario,
                'libera' => 1, // 1 disponibile, 0 non disponibile
            ]);
        }
        return redirect()->back()->with('success', 'Data aggiunta con successo!');
    }

    public function removeGiornata(Request $request)
    {
        $data = $request->input('data');
        $orario = $request->input('orario');

        // Validazione dei dati, solo la data è obbligatoria, l'orario è facoltativo
        if (!$data) {
            return redirect()->back()->withErrors(['message' => 'Data obbligatoria.']);
        }

        // Rimuovi la giornata dal database
        try {
            $query = DB::table('giornata')->where('data', $data)->where('libera', 1);

            if (!empty($orario)) {
                $query->where('orario', $orario);
            }


            $query->delete();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Si è verificato un errore durante la rimozione della data.']);
        }
        return redirect()->back()->with('success', 'Data rimossa con successo!');
    }

    public function removeAllGiornate()
    {
        try {
            DB::table('giornata')->where('libera', 1)->delete();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Si è verificato un errore durante la rimozione di tutte le date.']);
        }
        return redirect()->back()->with('success', 'Tutte le date sono state rimosse con successo!');
    }

    public function removeAllPrenotazioni()
    {
        try {
            $giornateCoinvolte = DB::table('prenotazione')
                ->distinct()
                ->pluck('id_giornata');

            if ($giornateCoinvolte->isEmpty()) {
                return redirect()->back()->withErrors(['message' => 'Non ci sono prenotazioni da rimuovere.']);
            }
            DB::table('prenotazione')->delete();

            if ($giornateCoinvolte->isNotEmpty()) {
                DB::table('giornata')
                    ->whereIn('id_giornata', $giornateCoinvolte)
                    ->update(['libera' => 1]);
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Si è verificato un errore durante la rimozione di tutte le prenotazioni.']);
        }
        return redirect()->back()->with('success', 'Tutte le prenotazioni sono state rimosse con successo!');
    }

    public function removePrenotazione(Request $request)
    {
        $prenotazioni = $request->input('prenotazioni');

        if (!$prenotazioni || !is_array($prenotazioni)) {
            return redirect()->back()->withErrors(['message' => 'Seleziona almeno una prenotazione da rimuovere.']);
        }

        try {
            foreach ($prenotazioni as $id_prenotazione) {
                $prenotazione = DB::table('prenotazione')->where('id_prenotazione', $id_prenotazione)->first();

                if ($prenotazione) {
                    DB::table('prenotazione')->where('id_prenotazione', $id_prenotazione)->delete();
                    DB::table('giornata')->where('id_giornata', $prenotazione->id_giornata)->update(['libera' => 1]);
                }
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Si è verificato un errore durante la rimozione delle prenotazioni selezionate.']);
        }

        return redirect()->back()->with('success', 'Prenotazioni selezionate rimosse con successo!');
    }

    public function removeAll()
    {
        try {
            DB::table('prenotazione')->truncate();
            DB::table('giornata')->truncate();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Si è verificato un errore durante la rimozione di tutto. ' . $e->getMessage()]);
        }
        return redirect()->back()->with('success', 'Tutto è stato rimosso con successo!');
    }

    public function exportCSV()
    {
        $prenotazioni = DB::table('prenotazione')
            ->join('giornata', 'prenotazione.id_giornata', '=', 'giornata.id_giornata')
            ->select('prenotazione.nome', 'prenotazione.cognome', 'prenotazione.email', 'prenotazione.telefono', 'giornata.data', 'giornata.orario', 'prenotazione.posti_prenotati')
            ->orderBy('giornata.data', 'desc')
            ->get();

        if ($prenotazioni->isEmpty()) {
            return redirect()->back()->withErrors(['message' => 'Non ci sono prenotazioni da esportare.']);
        }

        $csvData = "Nome,Cognome,Email,Numero di Telefono,Data,Orario,Posti Prenotati\n";

        foreach ($prenotazioni as $prenotazione) {
            $csvData .= "$prenotazione->nome,$prenotazione->cognome,$prenotazione->email,$prenotazione->telefono,$prenotazione->data,$prenotazione->orario,$prenotazione->posti_prenotati\n";
        }

        return response()->streamDownload(function () use ($csvData) {
            echo $csvData;
        }, 'prenotazioni.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

    // Endpoint per restituire tutte le prenotazioni e giornate in formato JSON (utile per debug o integrazioni future)
    public function tuttoDatabase()
    {
        $prenotazioni = DB::table('prenotazione')
            ->join('giornata', 'prenotazione.id_giornata', '=', 'giornata.id_giornata')
            ->select('prenotazione.*', 'giornata.data', 'giornata.orario')
            ->orderBy('giornata.data', 'desc')
            ->get();

        $giornate = DB::table('giornata')->orderBy('data', 'desc')->get();

        return json_encode([
            'prenotazioni' => $prenotazioni,
            'giornate' => $giornate
        ]);
    }
}
