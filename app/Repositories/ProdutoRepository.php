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
     public function indexDados(array $filtros, int $qnt = 10): LengthAwarePaginator
    {
        return Produto::query()
            ->with(['modelo.categoria'])
            ->when($filtros['busca'] ?? null, function ($query, $busca) {
                $query->where(function ($subQuery) use ($busca) {
                    $subQuery->where('nome', 'like', '%' . $busca . '%')
                        ->orWhereHas('modelo', fn($q) => $q->where('nome', 'like', '%' . $busca . '%'))
                        ->orWhereHas('modelo.categoria', fn($q) => $q->where('nome', 'like', '%' . $busca . '%'));
                });
            })
            ->when($filtros['genero'] ?? null, fn($query, $genero) => $query->where('genero', $genero))
            ->when($filtros['categoria_id'] ?? null, fn($query, $categoriaId) => $query->whereHas(
                'modelo.categoria',
                fn($q) => $q->where('id_categoria', $categoriaId)
            ))
            ->when($filtros['modelo_id'] ?? null, fn($query, $modeloId) => $query->where('modelo_id', $modeloId))
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
            ->with('categoria:id_categoria,nome')
            ->orderBy('nome')
            ->get(['id_modelo', 'nome', 'categoria_id']);
    }
}
