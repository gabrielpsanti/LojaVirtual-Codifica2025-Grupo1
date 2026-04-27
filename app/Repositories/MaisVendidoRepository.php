<?php

namespace App\Repositories;

use App\Models\MaisVendido;
use App\Models\Venda;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class MaisVendidoRepository
{
    public function atualizarRankingUltimas24Horas(): int
    {
        $agora = now();
        $inicioJanela = $agora->copy()->subDay();

        $ranking = Venda::query()
            ->select('variacao_produto_id')
            ->selectRaw('COUNT(*) as quantidade_vendas')
            ->where('created_at', '>=', $inicioJanela)
            ->groupBy('variacao_produto_id')
            ->orderByDesc('quantidade_vendas')
            ->orderBy('variacao_produto_id')
            ->get();

        DB::transaction(function () use ($ranking, $agora) {
            MaisVendido::query()->delete();

            $dados = [];
            foreach ($ranking as $index => $item) {
                $dados[] = [
                    'variacao_produto_id' => $item->variacao_produto_id,
                    'quantidade_vendas' => (int) $item->quantidade_vendas,
                    'ranking' => $index + 1,
                    'updated_at' => $agora,
                ];
            }

            MaisVendido::query()->insert($dados);
        });

        return $ranking->count();
    }

    public function listarTop(int $limite = 10): Collection
    {
        return MaisVendido::query()
            ->with(['variacao.produto', 'variacao.cor', 'variacao.tamanho'])
            ->orderBy('ranking')
            ->limit($limite)
            ->get();
    }

    public function listarTodos(): Collection
    {
        return MaisVendido::query()
            ->with(['variacao.produto', 'variacao.cor', 'variacao.tamanho'])
            ->orderBy('ranking')
            ->get();
    }
}
