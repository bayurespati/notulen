<?php

namespace App\Http\Middleware;

use Closure;

class Activated
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
        $user = auth()->user();

        if ($user->account_approved_at === null && $user->is_active === 0) {
            auth()->logout();
            return redirect('login')->with('status', [
                'type' => 'danger',
                'msg' => 'Akun Anda belum disetujui admin',
            ]);
        }
        else if ($user->is_active === 0) {
            auth()->logout();
            return redirect('login')->with('status', [
                'type' => 'danger',
                'msg' => 'Akun Anda telah di non-aktifkan oleh admin',
            ]);
        }
        return $next($request);
    }
}
