<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Repositories\ProdutoRepository;

class HomeController extends Controller
{
    public function __construct(
        private ProdutoRepository $produtoRepository
    ) {}

    public function index()
    {
        $produtos = $this->produtoRepository->home();

        $maisVendidos = $this->produtoRepository->maisVendidos();

       return view('pages.publico.home', compact('produtos', 'maisVendidos'));
    }
}
