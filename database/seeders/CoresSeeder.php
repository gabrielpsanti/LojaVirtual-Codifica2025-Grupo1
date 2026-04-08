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
            ['nome' => 'Cinza Chumbo'],
            ['nome' => 'Azul Marinho'],
            
        
            ['nome' => 'Verde Petróleo'],    
            ['nome' => 'Rosa Choque'],       
            ['nome' => 'Terracota'],         
            ['nome' => 'Verde Menta'],       
            ['nome' => 'Lavanda'],           
            ['nome' => 'Amarelo Mostarda'],  
            ['nome' => 'Vinho'],            
            ['nome' => 'Bege Areia'],        
            ['nome' => 'Azul Sereno'],      
        ];

        foreach ($cores as $cor) {
            Cor::updateOrCreate(
                ['nome' => $cor['nome']], 
                ['nome' => $cor['nome']]
            );
        }
    }
}
