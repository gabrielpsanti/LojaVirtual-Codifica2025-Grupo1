<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;

class PerfilCliente extends Controller
{
    public function index()
    {
        return view('cliente.publico.perfil');
    }
}
