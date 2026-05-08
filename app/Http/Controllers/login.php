<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class login extends Controller
{
    public function index(Request $request)
    {
        $username = $request->input('user');
        $password = $request->input('password');

        // Se i campi sono vuoti, non contare nemmeno il tentativo
        if (!$username || !$password) {
            return redirect('/login')->withErrors(['Username e Password richiesti']);
        }

        $lockoutKey = 'login_attempts_' . $username;
        $blockedKey = 'login_blocked_' . $username;

        if (cache()->has($blockedKey)) {
            return redirect('/login')->withErrors(['Account bloccato per 24 ore.']);
        }

        $admin = DB::table('admin')->where('username', $username)->first();

        if ($admin && Hash::check($password, $admin->password)) {
            cache()->forget($lockoutKey);
            cache()->forget($blockedKey);
            $newToken = Str::random(80);
            DB::table('admin')->where('username', $admin->username)->update([
                'token' => hash('sha256', $newToken) // Salva l'hash, non il token vero!
            ]);
            $request->session()->put(['token' => $newToken]);
            $request->session()->put(['username' => $admin->username]);
            return redirect('/dashboard');
        }

        // Se la chiave non esiste, la crea partendo da 1. Se esiste, aggiunge 1.
        $attempts = cache()->increment($lockoutKey);

        if ($attempts === 3) {
            cache()->put($lockoutKey, 1, now()->addHours(1));
            return redirect('/login')->withErrors(['Troppi tentativi falliti. Bloccato per 1 ora.']);
        }

        if ($attempts >= 4) {
            // Blocca l'utente per 24 ore
            cache()->put($blockedKey, true, now()->addHours(24));
            cache()->forget($lockoutKey);
            return redirect('/login')->withErrors(['Troppi tentativi falliti. Bloccato per 24 ore.']);
        }

        return redirect('/login')->withErrors(['Credenziali errate. Tentativo ' . $attempts . ' di 4']);
    }


    public function db()
    {

        Schema::dropIfExists('prenotazione');
        //Schema::dropIfExists('giornata');
        //Schema::dropIfExists('admin');


        // Creazione tabella 'prenotazione'
        Schema::create('prenotazione', function (Blueprint $table) {
            $table->integer('id_prenotazione')->autoIncrement(); // PRIMARY KEY AUTOINCREMENT 
            $table->string('cancel_token', 300)->unique();
            $table->string('qr_token', 300)->unique();
            $table->boolean('conferma')->default(false);
            $table->string('nome', 40);
            $table->string('cognome', 40);
            $table->string('email', 40);
            $table->string('telefono', 30);
            $table->integer('posti_prenotati');
            $table->integer('id_giornata');

            // Se desideri aggiungere la relazione con la tabella giornata:
            $table->foreign('id_giornata')->references('id_giornata')->on('giornata');
        });

        return "Tabelle create con successo!";
    }

    public function test(){
        $columns = Schema::getColumnListing('prenotazione');
        return $columns;

    }

    public function signup()
    {


        $username = 'admin';
        $password = 'admin123';

        DB::table('admin')->insert([
            'username' => $username,
            'password' => Hash::make($password)
        ]);

        return 'Admin user created with username: ' . $username . ' and password: ' . $password;
    }
}
