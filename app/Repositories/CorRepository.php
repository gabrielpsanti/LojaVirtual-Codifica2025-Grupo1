<?php

namespace App\Repositories;

use App\Models\Cor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CorRepository
{
    public function paginateOrderedByName(int $qnt = 10): LengthAwarePaginator
    {
        return Cor::query()
            ->orderBy('nome')
            ->paginate($qnt);
    }

    public function create(array $dados): Cor
    {
        return Cor::create($dados);
    }

    public function update(Cor $cor, array $dados): bool
    {
        return $cor->update($dados);
    }

    public function delete(Cor $cor): ?bool
    {
        return $cor->delete();
    }
}
