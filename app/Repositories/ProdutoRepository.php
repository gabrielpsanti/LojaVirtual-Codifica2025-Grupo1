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
