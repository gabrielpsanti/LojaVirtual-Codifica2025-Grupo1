<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\ClienteLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCliente extends Controller
{
    public function showLoginForm()
    {
        return view("pages.publico.login");
    }

    public function login(ClienteLoginRequest $request)
    {
        $dados = $request->validated();

        if (!Auth::guard('cliente')->attempt([
            'email' => $dados['email'],
            'password' => $dados['senha'],
            'flag_admin' => false,
        ])) {
            return back()
                ->withErrors(["email" => "E-mail ou senha inválidos."]);
        }

        $request->session()->regenerate();

        return redirect()->route("publico.home");
    }

    public function logout(Request $request)
    {
        Auth::guard('cliente')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("publico.home");
    }
}
