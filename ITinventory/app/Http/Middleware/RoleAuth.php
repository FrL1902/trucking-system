<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $page)
    // public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah user telah/masih login atau tidak (session habis atau tidak). Jika auth gagal, akan dibalikkan ke login page
        if (!Auth::check()) {
            // return redirect('/');
            return redirect('/login');
        }

        // ini untuk page yang ga butuh special permission, tapi cuma harus login doang
        if ($page == 'auth') {
            return $next($request);
        }

        return abort(401);
    }
}
