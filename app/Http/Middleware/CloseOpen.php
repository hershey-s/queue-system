<?php

namespace App\Http\Middleware;

use Closure;
use App\Office;

class CloseOpen
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
        $status = Office::where('id', 1)->first();

        if(session('userType') == 'admin' || session('userType') == 'superadmin') {
            return $next($request);
        }
        else {
            if($status->status_1 == 'Open') {
                return $next($request);
            }
            else {
                return redirect('/patient-records')->withErrors(['Clinic is closed!', 'danger']);
            }
        }
    }
}