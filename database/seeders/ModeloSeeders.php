<?php

namespace Database\Seeders;

use App\Models\Modelo;
use Illuminate\Database\Seeder;

class ModeloSeeders extends Seeder
{
    public function run(): void
    {

        // CATEGORIA 1 (Suéteres)
        Modelo::create(['nome' => 'Básico', 'categoria_id' => 1]); 
        Modelo::create(['nome' => 'Cardigan', 'categoria_id' => 1]); 
        Modelo::create(['nome' => 'Gola alta', 'categoria_id' => 1]); 
        Modelo::create(['nome' => 'Tricot', 'categoria_id' => 1]);  

        // CATEGORIA 2 (Parte de cima)
        Modelo::create(['nome' => 'Camiseta gola Polo', 'categoria_id' => 2]); 
        Modelo::create(['nome' => 'Camiseta básica', 'categoria_id' => 2]); 
        Modelo::create(['nome' => 'Regata', 'categoria_id' => 2]); 
        Modelo::create(['nome' => 'Blusa de manga longa', 'categoria_id' => 2]);   
        Modelo::create(['nome' => 'Jaquetas e Casacos', 'categoria_id' => 2]); 
        Modelo::create(['nome' => 'Blazer', 'categoria_id' => 2]); 
        Modelo::create(['nome' => 'Camisa social', 'categoria_id' => 2]); 

        // CATEGORIA 3 (Parte de baixo)
        Modelo::create(['nome' => 'Calça Cargo', 'categoria_id' => 3]); 
        Modelo::create(['nome' => 'Calça jeans', 'categoria_id' => 3]); 
        Modelo::create(['nome' => 'Calça social', 'categoria_id' => 3]); 
        Modelo::create(['nome' => 'Calça moletom', 'categoria_id' => 3]); 
        Modelo::create(['nome' => 'Legging', 'categoria_id' => 3]); 
        Modelo::create(['nome' => 'Bermudas', 'categoria_id' => 3]); 
        Modelo::create(['nome' => 'Shorts', 'categoria_id' => 3]);  
        Modelo::create(['nome' => 'Saia midi', 'categoria_id' => 3]); 
        Modelo::create(['nome' => 'Saia longa', 'categoria_id' => 3]); 

        // CATEGORIA 4 (Vestidos)
        Modelo::create(['nome' => 'Midi', 'categoria_id' => 4]); 
        Modelo::create(['nome' => 'Longo', 'categoria_id' => 4]); 
        Modelo::create(['nome' => 'Casual', 'categoria_id' => 4]); 
        Modelo::create(['nome' => 'De festa', 'categoria_id' => 4]); 
        Modelo::create(['nome' => 'Tubinho', 'categoria_id' => 4]);  
    }
}//ctrl espaço //shift,alt, f
