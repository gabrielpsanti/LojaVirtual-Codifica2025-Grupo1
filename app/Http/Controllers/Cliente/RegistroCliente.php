<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\ClienteRegistroRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class RegistroCliente extends Controller
{
    public function showRegistroForm()
    {
        return view('pages.publico.registro');
    }

    public function store(ClienteRegistroRequest $request)
    {
        $validated = $request->validated();

        Usuario::create([
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'senha' => Hash::make($validated['senha']),
            'flag_admin' => false,
        ]);

        return redirect()->route('cliente.login.form')
            ->with('sucesso', 'Cadastro realizado com sucesso! Faça o login.');
    }
}
