<?php

namespace App\Repositories;

use App\Models\Modelo;
use App\Models\Produto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProdutoRepository
{
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
