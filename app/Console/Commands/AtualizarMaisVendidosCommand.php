<?php

namespace App\Console\Commands;

use App\Repositories\MaisVendidosRepository;
use Illuminate\Console\Command;

class AtualizarMaisVendidosCommand extends Command
{
    protected $signature = 'mais-vendidos:atualizar';

    public function handle(MaisVendidosRepository $maisVendidosRepository): int
    {
        $total = $maisVendidosRepository->atualizarRankingUltimas24Horas();

        $this->info("Tabela mais_vendidos atualizada com {$total} item(ns).");

        return self::SUCCESS;
    }
}
