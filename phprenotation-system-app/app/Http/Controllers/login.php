<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class login extends Controller
{
    private $token = 'XBjdp5v5ALkSh7FDxEZC9R4hhjYvqSVW6mw8KyQAZYZu1xxw6KgRrqyerlEoYyDTsILDbhq2tGx7DfWzVBPsUfdrpufUHTlSvWZR50uVKJMCj13k8DJuUge5d0QH4CEReBdCX';

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

        $admin = DB::table('admin')->where('nome', $username)->first();

        if ($admin && Hash::check($password, $admin->password)) {
            cache()->forget($lockoutKey);
            cache()->forget($blockedKey);
            $request->session()->put(['token' => $this->token]);
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

    public function signup()
    {
        $username = 'admin';
        $password = 'password';

        DB::table('admin')->insert([
            'nome' => $username,
            'password' => Hash::make($password)
        ]);

        return 'Admin user created with username: ' . $username . ' and password: ' . $password;
    }
}
