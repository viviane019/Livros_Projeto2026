<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GestorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('filament.admin.auth.login');
        }

        if ($user->perfil !== 'gestor') {
            abort(403, 'Acesso negado');
        }

        return $next($request);
    }
}