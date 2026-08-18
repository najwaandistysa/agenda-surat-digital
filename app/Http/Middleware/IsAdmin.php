<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Mengecek apakah user sudah login dan memiliki role admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        abort(403, 'Anda tidak memiliki hak akses untuk tindakan ini.');
    }
}