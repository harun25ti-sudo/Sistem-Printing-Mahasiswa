<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan masuk ke akun Anda terlebih dahulu.');
        }

        $user = auth()->user();

        // Check if user status is pending or rejected
        if ($user->status === 'pending') {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('warning', 'Akun Anda sedang menunggu konfirmasi/persetujuan dari Administrator.');
        }

        if ($user->status === 'rejected') {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('error', 'Akun Anda telah ditolak oleh Administrator. Silakan hubungi tim bantuan.');
        }

        // If specific roles required, check
        if (!empty($roles) && !in_array($user->role, $roles)) {
            // If user is trying to access admin pages but role is not admin
            if (in_array('admin', $roles)) {
                return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki hak akses Administrator.');
            }
        }

        return $next($request);
    }
}
