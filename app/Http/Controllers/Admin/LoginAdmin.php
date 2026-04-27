<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginAdmin extends Controller
{
    public function showLoginForm()
    {
        return view('pages.admin.adminLogin');
    }

    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->validated();

        $usuario = Usuario::where('email', $credentials['email'])->first();

        if (!$usuario || !Hash::check($credentials['senha'], $usuario->senha)) {
            return back()
                ->withErrors(['email' => 'E-mail ou senha inválidos.']);
        }

        if (!$usuario->flag_admin) {
            return back()
                ->withErrors(['email' => 'Usuário sem permissão.'])
                ->onlyInput('email');
        }

        Auth::guard('admin')->login($usuario);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.form');
    }
}
