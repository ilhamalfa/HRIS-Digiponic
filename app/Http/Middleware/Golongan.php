<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Golongan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $golongans): Response
    {
        foreach($golongans as $golongan){
            if(auth()->user()->golongan == $golongan){
                // dd($role);
                return $next($request);
            }
        }
        return redirect('/');
        // return $next($request);
    }
}
