<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Models\Modelo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ModeloRepository
{
    public function paginateOrderedByName(int $qnt = 10): LengthAwarePaginator
    {
        return Modelo::query()
            ->with('categoria')
            ->orderBy('nome')
            ->paginate($qnt);
    }

    public function create(array $dados): Modelo
    {
        return Modelo::create($dados);
    }

    public function update(Modelo $modelo, array $dados): bool
    {
        return $modelo->update($dados);
    }

    public function delete(Modelo $modelo): ?bool
    {
        return $modelo->delete();
    }

    public function getCategorias(): Collection
    {
        return Categoria::query()
            ->orderBy('nome')
            ->get(['id_categoria', 'nome']);
    }
}
