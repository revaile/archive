<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  $roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ?string $roles = null): HttpFoundationResponse
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil role pengguna saat ini
        $userRole = Auth::user()->role;

        // Validasi role jika parameter role diberikan
        if ($roles && $userRole !== $roles) {
            // Redirect berdasarkan role pengguna
            switch ($roles) {
                case 'admin':
                    return redirect()->route('dashboard')->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
                case 'user':
                    return redirect()->route('user.mydocuments.index')->with('error', 'Akses ditolak. Hanya user yang dapat mengakses halaman ini.');
                default:
                    return redirect()->route('home')->with('error', 'Akses ditolak. Role tidak valid.');
            }
        }

        // Lanjutkan ke middleware berikutnya jika lolos validasi
        return $next($request);
    }
}