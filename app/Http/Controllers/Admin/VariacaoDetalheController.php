<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VariacaoProduto;

class VariacaoDetalheController extends Controller
{
    public function show(VariacaoProduto $variacaoProduto)
    {
        $variacaoProduto->load('produto');

        return view('pages.admin.variacoes_produtos.variacao_detalhe', [
            'variacao' => $variacaoProduto,
            'produto' => $variacaoProduto->produto
        ]);
    }
}