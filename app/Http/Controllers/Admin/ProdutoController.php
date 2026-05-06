<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProdutoRequest;
use App\Models\Categoria;
use App\Models\Produto;
use App\Repositories\ProdutoRepository;
use App\Enums\FaixaEtariaProduto;
use App\Enums\GeneroProduto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct(
        private ProdutoRepository $produtoRepository
    ) {}

    public function index(Request $request)
    {
        $filtros = $request->only(['busca', 'genero', 'categoria_id', 'modelo_id']);
        $produtos = $this->produtoRepository->indexDados($filtros)->withQueryString();
        $generos = GeneroProduto::cases();
        $categorias = Categoria::query()->orderBy('nome')->get(['id_categoria', 'nome']);
        $modelos = $this->produtoRepository->getModelos();

        return view('pages.admin.produtos.index', compact('produtos', 'filtros', 'generos', 'categorias', 'modelos'));
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
        $dados['usuario_id'] = auth('admin')->user()->id_usuario;

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

    public function show(Produto $produto)
{
    return view('pages.admin.produtos.show', [
        'produto' => $produto
    ]);
}
}
