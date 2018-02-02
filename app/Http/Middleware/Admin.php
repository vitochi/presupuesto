<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(! auth()->user()->admin){
        // return response()->view('forbidden', [], 403); //PETICION PROHIBIDA O "FORBIDDEN"   
            throw new AuthorizationException;            
    }
        return $next($request);
    }
}
