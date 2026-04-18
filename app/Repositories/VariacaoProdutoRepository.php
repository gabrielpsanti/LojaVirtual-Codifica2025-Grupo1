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
    public function paginateOrderedById(int $qnt = 10): LengthAwarePaginator
    {
        return VariacaoProduto::query()
            ->with(['produto', 'cor', 'tamanho'])
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
