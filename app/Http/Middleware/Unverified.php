<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class Unverified
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
        if (Auth::user()->status) {
          return $next($request);
        }
        Session::flash('error', 'Anda tidak berhak mengakses halaman ini');
        return redirect()->route('unverified');
    }
}
