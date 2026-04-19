<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cor;

class CoresSeeder extends Seeder
{
   
    public function run(): void
    {
        $cores = [
            ['nome' => 'Preto'],
            ['nome' => 'Branco'],
            ['nome' => 'Azul Marinho'],
            ['nome' => 'Verde'],
            ['nome' => 'Vermelho'],
            ['nome' => 'Azul'],
            ['nome' => 'Bege'],
            ['nome' => 'Vinho'],
            ['nome' => 'Marrom'],
            ['nome' => 'Azul Claro'],
            ['nome' => 'Marrom Claro'],
        ];

        foreach ($cores as $cor) {
            Cor::updateOrCreate(
                ['nome' => $cor['nome']], 
                ['nome' => $cor['nome']]
            );
        }
    }
}
