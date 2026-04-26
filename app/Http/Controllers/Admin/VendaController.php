<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'produto_id' => ['nullable', 'integer', 'exists:produtos,id_produto'],
            'cliente_id' => ['nullable', 'integer', 'exists:usuarios,id_usuario'],
            'data_venda' => ['nullable', 'date'],
        ]);

        $filtros = [
            'produto_id' => $request->input('produto_id'),
            'cliente_id' => $request->input('cliente_id'),
            'data_venda' => $request->input('data_venda'),
        ];

        $produtos = Produto::query()
            ->orderBy('nome')
            ->get();

        $clientes = Usuario::query()
            ->where('flag_admin', false)
            ->orderBy('nome')
            ->get();

        $vendas = Venda::query()
            ->with(['usuario', 'variacaoProduto.produto', 'variacaoProduto.cor', 'variacaoProduto.tamanho'])
            ->when($filtros['produto_id'], function ($query, $produtoId) {
                $query->whereHas('variacaoProduto', function ($subQuery) use ($produtoId) {
                    $subQuery->where('produto_id', $produtoId);
                });
            })
            ->when($filtros['cliente_id'], function ($query, $clienteId) {
                $query->where('usuario_id', $clienteId);
            })
            ->when($filtros['data_venda'], function ($query, $dataVenda) {
                $query->whereDate('created_at', $dataVenda);
            })
            ->orderByDesc('created_at')
            ->orderByDesc('id_venda')
            ->get();

        return view('pages.admin.vendas.index', compact('vendas', 'produtos', 'clientes', 'filtros'));
    }
}
