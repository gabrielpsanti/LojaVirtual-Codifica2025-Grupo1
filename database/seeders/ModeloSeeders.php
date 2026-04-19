<?php

namespace Database\Seeders;

use App\Models\Modelo;
use Illuminate\Database\Seeder;

class ModeloSeeders extends Seeder
{
    public function run(): void
    {
        //categoria_id
        // 1 => Camisas
        // 2 => Calças

        //CAMISAS
        Modelo::create(['nome' => 'Linho', 'categoria_id' => 1]);
        Modelo::create(['nome' => 'Xadrez', 'categoria_id' => 1]);
        Modelo::create(['nome' => 'Jeans', 'categoria_id' => 1]);
        Modelo::create(['nome' => 'Polo', 'categoria_id' => 1]);

        //CALÇAS
        Modelo::create(['nome' => 'Slim', 'categoria_id' => 2]);
        Modelo::create(['nome' => 'Cargo', 'categoria_id' => 2]);
        Modelo::create(['nome' => 'Moletom', 'categoria_id' => 2]);
        Modelo::create(['nome' => 'Jeans', 'categoria_id' => 2]);
        Modelo::create(['nome' => 'Wide', 'categoria_id' => 2]);
    }
}
