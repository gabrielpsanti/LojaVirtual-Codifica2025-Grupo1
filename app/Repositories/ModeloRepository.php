<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Models\Modelo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ModeloRepository
{
    public function indexDados(array $filtros, int $qnt = 10): LengthAwarePaginator
    {
        return Modelo::query()
            ->with('categoria')
            ->when($filtros['busca'] ?? null, function ($query, $busca) {
                $query->where(function ($subQuery) use ($busca) {
                    $subQuery->where('nome', 'like', '%' . $busca . '%')
                        ->orWhereHas('categoria', fn ($q) => $q->where('nome', 'like', '%' . $busca . '%'));
                });
            })
            ->when($filtros['categoria_id'] ?? null, fn ($query, $categoriaId) => $query->where('categoria_id', $categoriaId))
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
