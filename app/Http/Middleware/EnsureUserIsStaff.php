<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsStaff
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Admin juga boleh akses route staff
        if (!Auth::user()->isAdmin() && !Auth::user()->isStaff()) {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk staff.');
        }

        return $next($request);
    }
}
