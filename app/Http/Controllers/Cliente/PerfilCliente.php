<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use App\Repositories\VendaRepository;

class PerfilCliente extends Controller
{
    protected $vendaRepository;

    public function areaCliente()
    {
        $usuarioId = auth('cliente')->id();
        $vendas = Venda::query()
            ->with(['variacaoProduto.produto', 'variacaoProduto.cor', 'variacaoProduto.tamanho'])
            ->where('usuario_id', $usuarioId)
            ->latest('id_venda')
            ->get();

        return view('pages.cliente.area', compact('vendas'));
    }

    public function index()
    {
        return view('pages.cliente.perfil');
    }
}
