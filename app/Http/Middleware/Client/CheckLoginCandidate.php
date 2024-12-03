<?php

namespace App\Http\Middleware\Client;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginCandidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('client.candidate.login');
        }

        if ($user->role === 'candidate') {
            return $next($request);
        }else {

            return redirect()->route('client.client.index');
        }


    }
}
