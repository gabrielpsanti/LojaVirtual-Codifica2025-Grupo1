<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VariacaoProdutoRequest;
use App\Models\VariacaoProduto;
use App\Repositories\VariacaoProdutoRepository;

class VariacaoProdutoController extends Controller
{
    public function __construct(
        private VariacaoProdutoRepository $variacaoProdutoRepository
    ) {}

    public function index()
    {
        $variacoesProdutos = $this->variacaoProdutoRepository->paginateOrderedById();

        return view('pages.admin.variacoes_produtos.index', compact('variacoesProdutos'));
    }

    public function create()
    {
        $produtos = $this->variacaoProdutoRepository->getProdutos();
        $cores = $this->variacaoProdutoRepository->getCores();
        $tamanhos = $this->variacaoProdutoRepository->getTamanhos();

        return view('pages.admin.variacoes_produtos.criar', compact('produtos', 'cores', 'tamanhos'));
    }

    public function store(VariacaoProdutoRequest $request)
    {
        $dados = $request->validated();

        $this->variacaoProdutoRepository->create($dados);

        return redirect()
            ->route('admin.variacao_produtos.index')
            ->with('success', 'Variação de produto cadastrada com sucesso.');
    }

    public function edit(VariacaoProduto $variacaoProduto)
    {
        $produtos = $this->variacaoProdutoRepository->getProdutos();
        $cores = $this->variacaoProdutoRepository->getCores();
        $tamanhos = $this->variacaoProdutoRepository->getTamanhos();

        return view('pages.admin.variacoes_produtos.editar', compact('variacaoProduto', 'produtos', 'cores', 'tamanhos'));
    }

    public function update(VariacaoProdutoRequest $request, VariacaoProduto $variacaoProduto)
    {
        $dados = $request->validated();

        $this->variacaoProdutoRepository->update($variacaoProduto, $dados);

        return redirect()
            ->route('admin.variacao_produtos.index')
            ->with('success', 'Variação de produto atualizada com sucesso.');
    }

    public function destroy(VariacaoProduto $variacaoProduto)
    {
        $this->variacaoProdutoRepository->delete($variacaoProduto);

        return redirect()
            ->route('admin.variacao_produtos.index')
            ->with('success', 'Variação de produto removida com sucesso.');
    }
}
