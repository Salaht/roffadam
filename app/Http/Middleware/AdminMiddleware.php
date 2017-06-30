<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AdminMiddleware
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
        // Check authentatcation of het een bezoeker of een gebruiker is. 
        if (Auth::guest() OR Auth::user()->Role->name == "user") {
            return redirect('/');
        }

        return $next($request);
    }


}
