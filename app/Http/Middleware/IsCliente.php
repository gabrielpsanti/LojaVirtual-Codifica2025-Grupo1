<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsCliente
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $clienteGuard = Auth::guard('cliente');

        if (!$clienteGuard->check()) {
            return redirect()
                ->route('cliente.login.form')
                ->withErrors(['email' => 'É necessário fazer login para acessar esta página.']);
        }

        if ($clienteGuard->user()->flag_admin) {
            $clienteGuard->logout();

            return redirect()
                ->route('cliente.login.form')
                ->withErrors(['email' => 'Usuário sem permissão para área de cliente.']);
        }

        return $next($request);
    }
}
