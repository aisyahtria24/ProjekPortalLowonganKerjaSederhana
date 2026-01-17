<?php

namespace App\Http\Middleware;

//untuk menentukan route tujuan setelah login
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        //jika tidak ada guards yang dikirim, gunakan default
        $guards = empty($guards) ? [null] : $guards;

        //loop setiap guard yang tersedia
        foreach ($guards as $guard) {
            //mengecek apakah user sudah login dengan guard tertentu
            if (Auth::guard($guard)->check()) {
                //jika sudah login, redirect ke halaman home
                return redirect(RouteServiceProvider::HOME);
            }
        }

        //jika belum login, lanjutkan request ke proses berikutnya
        return $next($request);
    }
}
