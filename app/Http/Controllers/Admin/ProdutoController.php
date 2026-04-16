<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProdutoRequest;
use App\Models\Produto;
use App\Repositories\ProdutoRepository;
use App\Enums\FaixaEtariaProduto;
use App\Enums\GeneroProduto;

class ProdutoController extends Controller
{
    public function __construct(
        private ProdutoRepository $produtoRepository
    ) {}

    public function index()
    {
        $produtos = $this->produtoRepository->paginateOrderedByName();

        return view('pages.admin.produtos.index', compact('produtos'));
    }

    public function create()
    {
        $modelos = $this->produtoRepository->getModelos();
        $faixasEtarias = FaixaEtariaProduto::cases();
        $generos = GeneroProduto::cases();

        return view('pages.admin.produtos.criar', compact('modelos', 'faixasEtarias', 'generos'));
    }

    public function store(ProdutoRequest $request)
    {
        $dados = $request->validated();
        $dados['usuario_id'] = auth()->user()->id_usuario;

        $this->produtoRepository->create($dados);

        return redirect()
            ->route('admin.produtos.index')
            ->with('success', 'Produto cadastrado com sucesso.');
    }

    public function edit(Produto $produto)
    {
        $modelos = $this->produtoRepository->getModelos();
        $faixasEtarias = FaixaEtariaProduto::cases();
        $generos = GeneroProduto::cases();

        return view('pages.admin.produtos.editar', compact('produto', 'modelos', 'faixasEtarias', 'generos'));
    }

    public function update(ProdutoRequest $request, Produto $produto)
    {
        $dados = $request->validated();

        $this->produtoRepository->update($produto, $dados);

        return redirect()
            ->route('admin.produtos.index')
            ->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Produto $produto)
    {
        $this->produtoRepository->delete($produto);

        return redirect()
            ->route('admin.produtos.index')
            ->with('success', 'Produto removido com sucesso.');
    }
}
