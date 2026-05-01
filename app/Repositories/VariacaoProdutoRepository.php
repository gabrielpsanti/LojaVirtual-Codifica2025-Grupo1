<?php

namespace App\Repositories;

use App\Models\Cor;
use App\Models\Produto;
use App\Models\Tamanho;
use App\Models\VariacaoProduto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class VariacaoProdutoRepository
{
    public function indexDados(array $filtros = [], int $qnt = 10): LengthAwarePaginator
    {
        return VariacaoProduto::query()
            ->with(['produto.modelo.categoria', 'cor', 'tamanho'])
            ->when($filtros['genero'] ?? null, fn ($query, $genero) => $query->whereHas(
                'produto',
                fn ($q) => $q->where('genero', $genero)
            ))
            ->when($filtros['categoria_id'] ?? null, fn ($query, $categoriaId) => $query->whereHas(
                'produto.modelo.categoria',
                fn ($q) => $q->where('id_categoria', $categoriaId)
            ))
            ->when($filtros['modelo_id'] ?? null, fn ($query, $modeloId) => $query->whereHas(
                'produto.modelo',
                fn ($q) => $q->where('id_modelo', $modeloId)
            ))
            ->when($filtros['busca'] ?? null, function ($query, $busca) {
                $query->where(function ($subQuery) use ($busca) {
                    $subQuery->orWhereHas('produto', fn ($q) => $q->where('nome', 'like', '%' . $busca . '%'))
                        ->orWhereHas('produto.modelo', fn ($q) => $q->where('nome', 'like', '%' . $busca . '%'))
                        ->orWhereHas('produto.modelo.categoria', fn ($q) => $q->where('nome', 'like', '%' . $busca . '%'))
                        ->orWhereHas('cor', fn ($q) => $q->where('nome', 'like', '%' . $busca . '%'))
                        ->orWhereHas('tamanho', fn ($q) => $q->where('nome', 'like', '%' . $busca . '%'));
                });
            })
            ->orderBy('id_variacao_produto')
            ->paginate($qnt);
    }

    public function create(array $dados): VariacaoProduto
    {
        return VariacaoProduto::create($dados);
    }

    public function update(VariacaoProduto $variacaoProduto, array $dados): bool
    {
        return $variacaoProduto->update($dados);
    }

    public function delete(VariacaoProduto $variacaoProduto): ?bool
    {
        return $variacaoProduto->delete();
    }

    public function getProdutos(): Collection
    {
        return Produto::query()
            ->orderBy('nome')
            ->get(['id_produto', 'nome']);
    }

    public function getCores(): Collection
    {
        return Cor::query()
            ->orderBy('nome')
            ->get(['id_cor', 'nome']);
    }

    public function getTamanhos(): Collection
    {
        return Tamanho::query()
            ->orderBy('nome')
            ->get(['id_tamanho', 'nome']);
    }
}
