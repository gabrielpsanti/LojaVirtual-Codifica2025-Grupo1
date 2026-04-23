<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\ClienteLoginRequest;
use App\Models\Usuario;
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

        $usuario = Usuario::where("email", $dados["email"])->first();

        if (!Auth::attempt([
            'email' => $dados['email'],
            'password' => $dados['senha'],
        ])) {
            return back()
                ->withErrors(["email" => "E-mail ou senha inválidos."]);
        }

        Auth::login($usuario);
        $request->session()->regenerate();

        return redirect()->route("publico.home");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("publico.home");
    }
}
