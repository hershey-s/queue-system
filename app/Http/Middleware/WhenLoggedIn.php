<?php

namespace App\Http\Middleware;

use Closure;

class WhenLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(session()->has('username')) {
            return redirect('/patient-records');
        }

        else {
            return $next($request);
        }
    }
}
