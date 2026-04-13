<?php

namespace App\Repositories;

use App\Models\Tamanho;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TamanhoRepository
{
    public function paginateOrderedByName(int $qnt = 10): LengthAwarePaginator
    {
        return Tamanho::query()
            ->orderBy('nome')
            ->paginate($qnt);
    }

    public function create(array $dados): Tamanho
    {
        return Tamanho::create($dados);
    }

    public function update(Tamanho $tamanho, array $dados): bool
    {
        return $tamanho->update($dados);
    }

    public function delete(Tamanho $tamanho): ?bool
    {
        return $tamanho->delete();
    }
}
