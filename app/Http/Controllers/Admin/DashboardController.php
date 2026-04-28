<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\VariacaoProduto;
use App\Models\Venda;
use App\Repositories\MaisVendidoRepository;

class DashboardController extends Controller
{
    public function __construct(
        private MaisVendidoRepository $maisVendidoRepository
    ) {}

    public function index()
    {
        $maisVendidos = $this->maisVendidoRepository->listarTop(10);
        $totalVendas = Venda::query()->count();
        $totalProdutos = Produto::query()->count();
        $totalVariacoes = VariacaoProduto::query()->count();

        $variacoesEstoqueBaixo = VariacaoProduto::query()
            ->with(['produto', 'cor', 'tamanho'])
            ->where('estoque', '<', 50)
            ->orderBy('estoque', 'DESC')
            ->limit(10)
            ->get();

        return view('pages.admin.dashboard', compact(
            'maisVendidos',
            'totalVendas',
            'totalProdutos',
            'totalVariacoes',
            'variacoesEstoqueBaixo'
        ));
    }
}
