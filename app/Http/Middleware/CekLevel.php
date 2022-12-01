<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::user()->role == $role) {
            return $next($request);
        } else {
            if(Auth::user()->role == 'admin'){
                return redirect('/');
            } elseif(Auth::user()->role == 'siswa') {
                return redirect('/dashboard-siswa');
            } else {
                return redirect('/dashboard-guru');
            }
        }

        return redirect('/login');
    }
}
