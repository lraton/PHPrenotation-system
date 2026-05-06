<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    private $token = 'XBjdp5v5ALkSh7FDxEZC9R4hhjYvqSVW6mw8KyQAZYZu1xxw6KgRrqyerlEoYyDTsILDbhq2tGx7DfWzVBPsUfdrpufUHTlSvWZR50uVKJMCj13k8DJuUge5d0QH4CEReBdCX';

    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->get('token') == $this->token) {
            return $next($request);
        }

        return redirect('/dashboard'); 
    }
}
