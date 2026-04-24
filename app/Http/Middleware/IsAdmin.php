<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminGuard = Auth::guard('admin');

        if (!$adminGuard->check()) {
            return redirect()
                ->route('admin.login.form')
                -> withErrors(['email' => 'É necessário fazer o login.']);
        }

        if (!$adminGuard->user()->flag_admin) {
            $adminGuard->logout();
            //TODO TESTAR QUANDO O USUÁRIO LOGADO NÃO FOR ADMIN
            return redirect()
                ->route('admin.login.form')
                ->withErrors([
                    'email' => 'Usuário sem permissão.',
                ]);
        }

        return $next($request);
    }
}
