<?php

namespace App\Console\Commands;

use App\Repositories\MaisVendidoRepository;
use Illuminate\Console\Command;

class AtualizarMaisVendidosCommand extends Command
{
    protected $signature = 'mais-vendidos:atualizar';

    public function handle(MaisVendidoRepository $maisVendidoRepository): int
    {
        $total = $maisVendidoRepository->atualizarRankingUltimas24Horas();

        $this->info("Tabela mais_vendidos atualizada com {$total} item(ns).");

        return self::SUCCESS;
    }
}
