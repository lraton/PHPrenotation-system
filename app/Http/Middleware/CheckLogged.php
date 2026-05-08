<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckLogged
{
    public function handle(Request $request, Closure $next): Response
    {
        $sessionToken = $request->session()->get('token');

        if (!$sessionToken) {
            return redirect('/login')->withErrors(['Sessione assente. Effettua il login.']);
        }
        $hashedToken = hash('sha256', $sessionToken);
        $user = DB::table('admin')->where('token', $hashedToken)->first();

        if (!$user) {
            $request->session()->forget('token'); 
            return redirect('/login')->withErrors(['Sessione non valida.']);
        }

        return $next($request);
    }
}