<?php

namespace Database\Seeder;



Use Iluminate\Database\Seeder;
Use App\models\VariacaoProduto;
use Illuminate\Database\Seeder as DatabaseSeeder;




class VariacaoProdutoSeeder extends DatabaseSeeder 
{
    public function run(): void 
    {
        VariacaoProduto::create ([
            'produto_id' => null,
            'tamanho_id' => 1, //pp
            'modelo_id' => 1, //basico
            'estoque' => null,
            'preco' => 39,99
        ]);


        VariacaoProduto::create ([
            'produto_id' => null,
            'tamanho_id' => 2, //p
            'modelo_id' => 1, //basico
            'estoque' => null,
            'preco' => 39,99
        ]);




        VariacaoProduto::create ([
            'produto_id' => null,
            'tamanho-id' => 2, //p
            'modelo_id' => 5, //camiseta gola polo
            'estoque' => null,
            'preco' => 49,99
        ]);

        VariacaoProduto::create ([
            'produto_id' => null,
            'tamanho_id' => 3, //m
            'modelo_id' => 5,//camiseta gola polo
            'estoque' => null,
            'preco' => 49,99      
        ]);
    }
}