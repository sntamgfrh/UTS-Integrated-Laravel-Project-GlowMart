<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string ...$roles
    ): Response {
        // Pastikan pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Catat pemeriksaan akses untuk membantu menemukan penyebab 403
        Log::info('CEK AKSES GLOWMART', [
            'url' => $request->path(),
            'user_id' => $user->id,
            'role' => $user->role,
            'role_diizinkan' => $roles,
        ]);

        // Periksa apakah role pengguna diizinkan
        if (!in_array($user->role, $roles, true)) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
