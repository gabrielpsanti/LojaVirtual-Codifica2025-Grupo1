<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Enums\GeneroProduto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function feminino()
    {
        $produtos = Produto::where('genero', GeneroProduto::FEMININO->value)->get();
        return view('pages.publico.produtos.feminino', compact('produtos'));
    }

    public function masculino()
{
    $produtos = Produto::where('genero', GeneroProduto::MASCULINO->value)->get();
    return view('pages.publico.produtos.masculino', compact('produtos'));
}

    public function variacoes(Produto $produto)
    {
        $variacoes = $produto->variacoes()
            ->with(['cor', 'tamanho'])
            ->orderBy('preco')
            ->get()
            ->filter(fn ($variacao) => $variacao->cor && $variacao->tamanho)
            ->map(fn ($variacao) => [
                'id' => $variacao->id_variacao_produto,
                'cor_id' => $variacao->cor_id,
                'cor_nome' => $variacao->cor->nome,
                'tamanho_id' => $variacao->tamanho_id,
                'tamanho_nome' => $variacao->tamanho->nome,
                'preco' => $variacao->preco,
                'estoque' => $variacao->estoque,
                'imagem' => $variacao->imagem,
            ])
            ->values();

        $cores = $variacoes
            ->map(fn ($variacao) => [
                'id' => $variacao['cor_id'],
                'nome' => $variacao['cor_nome'],
            ])
            ->unique('id')
            ->sortBy('nome')
            ->values();

        return view('pages.publico.produtos.variacoes', compact(
            'produto',
            'cores',
            'variacoes',
        ));
    }

  public function pesquisa(Request $request)
{
    $search = trim($request->input('search'));
    $palavras = explode(' ', $search);

    $produtos = collect();

    foreach ($palavras as $palavra) {

        $resultados = Produto::query()
            ->where('nome', 'like', "%{$palavra}%")
            ->orWhereHas('modelo', function ($query) use ($palavra) {
                $query->where('nome', 'like', "%{$palavra}%");
            })
            ->orWhereHas('modelo.categoria', function ($query) use ($palavra) {
                $query->where('nome', 'like', "%{$palavra}%");
            })
            ->get();

        $produtos = $produtos->merge($resultados);
    }

    return view('pages.publico.produtos.index', [
        'produtos' => $produtos,
        'titulo' => 'Resultado da pesquisa'
    ]);
}
}