<?php

namespace App\Repositories;

use App\Models\Modelo;
use App\Models\Produto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProdutoRepository
{
    public function home(int $limit = 12): Collection
    {
        return Produto::query()
            ->with(['modelo.categoria'])
            ->withMin('variacoes', 'preco')
            ->latest()
            ->limit($limit)
            ->get();
    }

  public function maisVendidos(int $limite = 5): Collection
{
    return Produto::query()
        ->select('produtos.*', 'mais_vendidos.quantidade_vendas as total_vendas')
        ->join('variacoes_produtos', 'produtos.id_produto', '=', 'variacoes_produtos.produto_id')
        ->join('mais_vendidos', 'variacoes_produtos.id_variacao_produto', '=', 'mais_vendidos.variacao_produto_id')
        ->orderByDesc('mais_vendidos.quantidade_vendas')
        ->limit($limite)
        ->get();
}
    public function paginateOrderedByName(int $qnt = 10): LengthAwarePaginator
    {
        return Produto::query()
            ->with(['modelo'])
            ->orderBy('nome')
            ->paginate($qnt);
    }

    public function create(array $dados): Produto
    {
        return Produto::create($dados);
    }

    public function update(Produto $produto, array $dados): bool
    {
        return $produto->update($dados);
    }

    public function delete(Produto $produto): ?bool
    {
        return $produto->delete();
    }

    public function getModelos(): Collection
    {
        return Modelo::query()
            ->orderBy('nome')
            ->get(['id_modelo', 'nome']);
    }
}
