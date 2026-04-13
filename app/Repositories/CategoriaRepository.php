<?php

namespace App\Repositories;

use App\Models\Categoria;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CategoriaRepository
{
    public function paginateOrderedByName(int $qnt = 10): LengthAwarePaginator
    {
        return Categoria::query()
            ->orderBy('nome')
            ->paginate($qnt);
    }

    public function create(array $dados): Categoria
    {
        return Categoria::create($dados);
    }

    public function update(Categoria $categoria, array $dados): bool
    {
        return $categoria->update($dados);
    }

    public function delete(Categoria $categoria): ?bool
    {
        return $categoria->delete();
    }
}
