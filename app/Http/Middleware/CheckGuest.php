<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class CheckGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        $sessionToken = $request->session()->get('token');

        if (!$sessionToken) {
            return $next($request);
        }
        $hashedToken = hash('sha256', $sessionToken);
        $user = DB::table('admin')->where('token', $hashedToken)->first();

        if (!$user) {
            $request->session()->forget('token'); 
            return $next($request);
        }

        return redirect('/dashboard'); 
    }
}
