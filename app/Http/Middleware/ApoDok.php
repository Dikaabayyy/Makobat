<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApoDok
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->role == 'Admin') {
            return $next($request);
       } elseif(Auth::user() && Auth::user()->role == 'Apoteker'){
            return $next($request);
       } elseif(Auth::user() && Auth::user()->role == 'Dokter'){
            return $next($request);
       }

       return redirect('forbidden')->with('error','You have not admin access');
    }
}
?>
