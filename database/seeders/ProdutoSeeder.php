<?php

namespace Database\Seeders;

use App\Enums\FaixaEtariaProduto;
use App\Enums\GeneroProduto;
use App\Models\Produto;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        //modelo_id
        //CAMISAS
        // 1 => Linho
        // 2 => Xadrez
        // 3 => Jeans
        // 4 => Polo

        //CALÇAS
        // 5 => Slim
        // 6 => Cargo
        // 7 => Moletom
        // 8 => Jeans
        // 9 => Whide


        //CAMISAS MASCULINAS
        //CAMISAS LINHO MAGA CURTA => 1
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 1,
                'nome' => 'Camisa Manga Curta',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/557501/22894_C009_2-CAM-M-C-LINHO-PREM.jpg?v=639009981976700000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::MASCULINO->value,
            ]
        );

        //CAMISAS LINHO MAGA LONGA => 2
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 1,
                'nome' => 'Camisa Manga Longa',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/560244/22893_C009_1-CAM-M-L-LINHO-PREM.jpg?v=639044390402670000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::MASCULINO->value,
            ]
        );

        //CAMISAS XADREZ => 3
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 2,
                'nome' => 'Camisa Xadrez Premium',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/515072/22532_X083_1-CAM-XDZ-FLANELA.jpg?v=638838882522000000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::MASCULINO->value,
            ]
        );

        //CAMISAS JEANS => 4
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 3,
                'nome' => 'Camisa Jeans',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/527634/22988_C010_1-CAM-JNS-C--BLS.jpg?v=638893322377430000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::MASCULINO->value,
            ]
        );

        //CAMISAS POLO => 5
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 4,
                'nome' => 'Camisa Polo',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/567558/23582_C009_1-POLO-BSC-FIT-PQT-MOL-BORD-BR-INV.jpg?v=639108126145770000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::MASCULINO->value,
            ]
        );

        //CAMISAS POLO ZIPER => 6
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 4,
                'nome' => 'Camisa Polo Zíper',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/560253/23079_C009_1-POLO-ESP-ALG-C--ZIPER-INTERLOCK.jpg?v=639044390562000000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::MASCULINO->value,
            ]
        );


        //CALÇAS  MASCULINAS
        //CALÇA SLIM => 7
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 5,
                'nome' => 'Calça Slim',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/566785/23482_C003_1-CFSH-CHI-NEW-FLEX-C--PL.jpg?v=639102240375830000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::MASCULINO->value,
            ]
        );

        //CALÇA CARGO => 8
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 6,
                'nome' => 'Calça Cargo',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/565895/23481_C016_1-CFSH-CARGO-STONE-ALG.jpg?v=639093627590930000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::MASCULINO->value,
            ]
        );

        
        //CALÇA MOLETOM => 9
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 7,
                'nome' => 'Calça Moletom',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/521135/22892_C020_1-CFSH-MOL-TEXT-ETQ-B.jpg?v=638872470168100000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::MASCULINO->value,
            ]
        );

        //CALÇA JEANS => 10
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 8,
                'nome' => 'Calça Jeans',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/565867/23413_C051_1-CJNS-COMF-ESP-MEDIO.jpg?v=639093627210400000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::MASCULINO->value,
            ]
        );

        //CAMISAS FEMININAS
        //CAMISAS LINHO MAGA CURTA => 11
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 1,
                'nome' => 'Camisa ',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/551270/22916_C002_1-CAM-LISA-LINHO-ALG.jpg?v=638989848712830000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::FEMININO->value,
            ]
        );

        //CALÇAS FEMININAS
        //CALÇA SLIM => 12
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 5,
                'nome' => 'Calça Slim',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/567260/22595_C009_1-CCOL-CHI-BLS-FACA.jpg?v=639108081100000000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::FEMININO->value,
            ]
        );

        


        //CALÇA LISTRADA => 13
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 5,
                'nome' => 'Calça Listrada',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/567292/23538_C009_1-WIDE-LEG-LISTRADA.jpg?v=639108081444770000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::FEMININO->value,
            ]
        );

        //CALÇA WIDE => 14
        Produto::create(
            [
                'usuario_id' => 1,
                'modelo_id' => 9,
                'nome' => 'Calça Wide',
                'imagem_apresentacao' => 'https://taco.vtexassets.com/arquivos/ids/555994/23206_C003_1-CCOL-WIDE-LEG-TECIDO.jpg?v=638999345255830000',
                'descricao' => fake()->text(260),
                'faixa_etaria' => FaixaEtariaProduto::ADULTO->value,
                'genero' => GeneroProduto::FEMININO->value,
            ]
        );

    }
}
