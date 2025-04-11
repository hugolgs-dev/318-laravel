<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Authentification requise');
        }

        if (!auth()->user()->isAdmin()) {
            // Log la tentative d'accès non autorisé
            \Log::warning('Tentative d\'accès admin non autorisé', [
                'user_id' => auth()->id(),
                'ip' => $request->ip()
            ]);

            abort(403, 'Accès réservé aux administrateurs');
        }

        return $next($request);
    }
}
