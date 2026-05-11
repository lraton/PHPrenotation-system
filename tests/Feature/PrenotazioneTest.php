<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class PrenotazioneTest extends TestCase
{
    use RefreshDatabase; // Svuota il database a ogni test per pulizia

    /** @test */
    public function un_utente_puo_selezionare_una_data_e_completare_la_prenotazione()
    {
        // 1. Simula la visita alla pagina iniziale (Scelta Data)
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('Home') // Assicurati che il nome coincida con il file .vue
                ->has('giornateIniziali')
        );

        // 2. Simula la scelta di una data (Redirect alla selezione orari)
        $dataScelta = now()->addDay()->format('Y-m-d');

        $response = $this->get("/selezione?date={$dataScelta}");

        $response->assertStatus(200);
        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('DettagliPrenotazione')
                ->has('orari')
                ->where('dataScelta', now()->addDay()->format('d/m/Y'))
        );

        // 3. Simula l'invio (POST) del form finale
        $datiPrenotazione = [
            'nome'     => 'Mario',
            'cognome'  => 'Rossi',
            'email'    => 'mario.rossi@example.com',
            'telefono' => '3331234567',
            'orario'   => '10:00',
            'posti'    => 2,
        ];

        $response = $this->post('/prenotazione', $datiPrenotazione);

        // 4. Verifica il successo
        $response->assertRedirect('/');
        $this->followRedirects($response)
            ->assertInertia(
                fn(Assert $page) => $page
                    ->where('flash.success', 'Prenotazione effettuata con successo!')
            );

        // Verifica che i dati siano effettivamente nel database (opzionale)
        $this->assertDatabaseHas('prenotazioni', [
            'email' => 'mario.rossi@example.com',
            'posti' => 2
        ]);
    }
}
