<?php

namespace Database\Seeders;

use App\Models\Cor;
use App\Models\Produto;
use App\Models\Tamanho;
use App\Models\VariacaoProduto;
use Illuminate\Database\Seeder;

class VariacaoProdutoSeeder extends Seeder
{
    public function run(): void
    {
        //cor_id
        // 1 => 'Preto'
        // 2 => 'Branco'
        // 3 => 'Azul Marinho'
        // 4 => 'Verde'
        // 5 => 'Vermelho'
        // 6 => 'Azul'
        // 7 => 'Bege'
        // 8 => 'Vinho'
        // 9 => 'Marrom'
        // 10 => 'Azul Claro'
        // 11 => 'Marrom Claro'

        //IDS DOS TAMANHOS
        $tamanhos = [2, 3, 4, 5];

        foreach ($tamanhos as $tamanhoId) {
            //CAMISA MANGA CURTA
            //AZUL MARINHO
            VariacaoProduto::create([
                'produto_id' => 1,
                'cor_id' => 3,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/557501/22894_C009_2-CAM-M-C-LINHO-PREM.jpg?v=639009981976700000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA MANGA CURTA
            //BRANCO
            VariacaoProduto::create([
                'produto_id' => 1,
                'cor_id' => 2,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/557474/22894_C002_1-CAM-M-C-LINHO-PREM.jpg?v=639009981821170000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA MANGA LONGA
            //AZUL MARINHO
            VariacaoProduto::create([
                'produto_id' => 2,
                'cor_id' => 3,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/560244/22893_C009_1-CAM-M-L-LINHO-PREM.jpg?v=639044390402670000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA MANGA LONGA
            //BRANCO
            VariacaoProduto::create([
                'produto_id' => 2,
                'cor_id' => 2,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/557413/22893_C002_1-CAM-M-L-LINHO-PREM.jpg?v=639009981459170000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA XADREZ
            //BRANCO
            VariacaoProduto::create([
                'produto_id' => 3,
                'cor_id' => 2,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/515072/22532_X083_1-CAM-XDZ-FLANELA.jpg?v=638838882522000000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA XADREZ
            //VERDE
            VariacaoProduto::create([
                'produto_id' => 3,
                'cor_id' => 4,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/515089/22533_C020_1-CAM-XDZ-FLANELA.jpg?v=638838882618930000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA XADREZ
            //VERMELHO
            VariacaoProduto::create([
                'produto_id' => 3,
                'cor_id' => 5,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/515092/22534_C036_1-CAM-XDZ-FLANELA.jpg?v=638838882627370000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA JEANS
            //AZUL
            VariacaoProduto::create([
                'produto_id' => 4,
                'cor_id' => 6,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/527634/22988_C010_1-CAM-JNS-C--BLS.jpg?v=638893322377430000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA POLO
            //PRETO
            VariacaoProduto::create([
                'produto_id' => 5,
                'cor_id' => 1,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/567830/23585_C003_1-POLO-BSC-COMF-PQT-FLEX-C--ETQ-BR-INV.jpg?v=639108139216800000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA POLO
            //BEGE
            VariacaoProduto::create([
                'produto_id' => 5,
                'cor_id' => 7,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/567830/23585_C003_1-POLO-BSC-COMF-PQT-FLEX-C--ETQ-BR-INV.jpg?v=639108139216800000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA POLO
            //VERDE
            VariacaoProduto::create([
                'produto_id' => 5,
                'cor_id' => 4,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/567566/23582_C017_1-POLO-BSC-FIT-PQT-MOL-BORD-BR-INV.jpg?v=639108126339000000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA POLO
            //AZUL
            VariacaoProduto::create([
                'produto_id' => 5,
                'cor_id' => 6,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/567562/23582_C014_1-POLO-BSC-FIT-PQT-MOL-BORD-BR-INV.jpg?v=639108126266800000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA POLO
            //AZUL MARINHO
            VariacaoProduto::create([
                'produto_id' => 5,
                'cor_id' => 3,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/567558/23582_C009_1-POLO-BSC-FIT-PQT-MOL-BORD-BR-INV.jpg?v=639108126145770000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA POLO
            //VINHO
            VariacaoProduto::create([
                'produto_id' => 5,
                'cor_id' => 8,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/567838/23585_C055_1-POLO-BSC-COMF-PQT-FLEX-C--ETQ-BR-INV.jpg?v=639108139277700000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISAS POLO ZIPER
            //AZUL MARINHO
            VariacaoProduto::create([
                'produto_id' => 6,
                'cor_id' => 3,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/560253/23079_C009_1-POLO-ESP-ALG-C--ZIPER-INTERLOCK.jpg?v=639044390562000000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISAS POLO ZIPER
            //BRANCO
            VariacaoProduto::create([
                'produto_id' => 6,
                'cor_id' => 2,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/550107/23079_C002_1-POLO-ESP-ALG-C--ZIPER-INTERLOCK.jpg?v=638983062357770000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CALÇAS SLIM
            //PRETO
            VariacaoProduto::create([
                'produto_id' => 7,
                'cor_id' => 1,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/568287/23499_C003_1-CCOL-SLIM-ESCURO.jpg?v=639117837064570000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS SLIM
            //BRANCO
            VariacaoProduto::create([
                'produto_id' => 7,
                'cor_id' => 2,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/504536/22312_C026_1-CFSH-CHI-1-2-COS-FLEX-BIARRITZ.jpg?v=638751393180630000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS SLIM
            //VERDE
            VariacaoProduto::create([
                'produto_id' => 7,
                'cor_id' => 4,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/504514/22312_C020_1-CFSH-CHI-1-2-COS-FLEX-BIARRITZ.jpg?v=638751393091330000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS SLIM
            //AZUL
            VariacaoProduto::create([
                'produto_id' => 7,
                'cor_id' => 6,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/566792/23482_C013_1-CFSH-CHI-NEW-FLEX-C--PL.jpg?v=639102240467370000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS CARGO
            //VERDE
            VariacaoProduto::create([
                'produto_id' => 8,
                'cor_id' => 4,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/565895/23481_C016_1-CFSH-CARGO-STONE-ALG.jpg?v=639093627590930000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS CARGO
            //MARROM
            VariacaoProduto::create([
                'produto_id' => 8,
                'cor_id' => 9,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/565903/23481_C022_1-CFSH-CARGO-STONE-ALG.jpg?v=639093627658830000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS CARGO
            //PRETO
            VariacaoProduto::create([
                'produto_id' => 8,
                'cor_id' => 1,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/565888/23481_C005_1-CFSH-CARGO-STONE-ALG.jpg?v=639093627519400000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS MOLETOM
            //VERDE
            VariacaoProduto::create([
                'produto_id' => 9,
                'cor_id' => 4,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/521135/22892_C020_1-CFSH-MOL-TEXT-ETQ-B.jpg?v=638872470168100000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS JEANS
            //AZUL CLARO
            VariacaoProduto::create([
                'produto_id' => 10,
                'cor_id' => 10,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/567351/23548_C051_1-CJNS-SKIN-CLARA.jpg?v=639108099043970000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS JEANS
            //AZUL
            VariacaoProduto::create([
                'produto_id' => 10,
                'cor_id' => 6,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/566841/23547_C051_1-CJNS-SLIM-MEDIO.jpg?v=639102240972230000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS JEANS
            //AZUL MARINHO
            VariacaoProduto::create([
                'produto_id' => 10,
                'cor_id' => 3,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/565867/23413_C051_1-CJNS-COMF-ESP-MEDIO.jpg?v=639093627210400000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇAS JEANS
            //PRETO
            VariacaoProduto::create([
                'produto_id' => 10,
                'cor_id' => 1,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/565909/23140_C050_1-CJNS-SLIM-ESCURO.jpg?v=639093654087530000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);


            //FEMININO
            //CAMISA MANGA CURTA
            //BRANCO
            VariacaoProduto::create([
                'produto_id' => 11,
                'cor_id' => 2,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/551270/22916_C002_1-CAM-LISA-LINHO-ALG.jpg?v=638989848712830000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA MANGA CURTA
            //AZUL
            VariacaoProduto::create([
                'produto_id' => 11,
                'cor_id' => 6,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/543662/22916_C014_1-CAM-LISA-LINHO-ALG.jpg?v=638961741122870000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);

            //CAMISA MANGA CURTA
            //BEGE
            VariacaoProduto::create([
                'produto_id' => 11,
                'cor_id' => 6,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/550422/22916_C025_1-CAM-LISA-LINHO-ALG.jpg?v=638984016460800000',
                'estoque' => 150,
                'preco' => 89.90,
            ]);


            //CALÇA SLIM
            //PRETO
            VariacaoProduto::create([
                'produto_id' => 12,
                'cor_id' => 3,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/568287/23499_C003_1-CCOL-SLIM-ESCURO.jpg?v=639117837064570000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇA SLIM
            //MARROM CLARO
            VariacaoProduto::create([
                'produto_id' => 12,
                'cor_id' => 11,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/507120/22595_C025_1-CCOL-CHI-BLS-FACA.jpg?v=638779257127900000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

            //CALÇA LISTRADA
            //BEGE
            VariacaoProduto::create([
                'produto_id' => 13,
                'cor_id' => 7,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/567292/23538_C009_1-WIDE-LEG-LISTRADA.jpg?v=639108081444770000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);

             //CALÇA WIDE
            //PRETO
            VariacaoProduto::create([
                'produto_id' => 14,
                'cor_id' => 1,
                'tamanho_id' => $tamanhoId,
                'imagem' => 'https://taco.vtexassets.com/arquivos/ids/555994/23206_C003_1-CCOL-WIDE-LEG-TECIDO.jpg?v=638999345255830000',
                'estoque' => 150,
                'preco' => 179.90,
            ]);
        }
    }
}
