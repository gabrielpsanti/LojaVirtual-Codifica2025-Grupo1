<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;
use App\Models\Modelo;
use App\Enums\FaixaEtariaProduto;
use App\Enums\GeneroProduto;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        Produto::create([
            'usuario_id' => 1,
            'modelo_id' => 10,
            'nome' => 'Calça Extreme',
            'faixa_etaria' => 2,
            'genero' => 1
        ]);

        Produto::create([
            'usuario_id' => 1,
            'modelo_id' => 10,
            'nome' => 'Calça XTZ',
            'faixa_etaria' => 2,
            'genero' => 1
        ]);
    }

    // private function gerarPreco(int $categoriaId): float
    // {
    //     return match ($categoriaId) {
    //         1 => rand(120, 250), // suéter
    //         2 => rand(50, 180),  // parte de cima
    //         3 => rand(70, 200),  // parte de baixo
    //         4 => rand(150, 400), // vestidos
    //         default => rand(50, 200),
    //     };
    // }
}
