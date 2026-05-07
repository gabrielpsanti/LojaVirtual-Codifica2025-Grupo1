<?php

namespace Database\Seeders;

use App\Models\Usuario;
use App\Models\VariacaoProduto;
use App\Models\Venda;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VendaSeeder extends Seeder
{
    public function run(): void
    {
        $cliente1 = Usuario::query()->updateOrCreate(
            ['email' => 'cliente1@email.com'],
            [
                'nome' => 'Cliente 1',
                'senha' => Hash::make('123456'),
                'flag_admin' => false,
            ]
        );

        $cliente2 = Usuario::query()->updateOrCreate(
            ['email' => 'cliente2@email.com'],
            [
                'nome' => 'Cliente 2',
                'senha' => Hash::make('123456'),
                'flag_admin' => false,
            ]
        );

        $variacoes = VariacaoProduto::query()
            ->orderBy('id_variacao_produto')
            ->limit(10)
            ->get(['id_variacao_produto', 'preco']);

        if ($variacoes->count() < 10) {
            return;
        }

        $usuarios = [$cliente1->id_usuario, $cliente2->id_usuario];
        $dadosVendas = [];

        foreach ($variacoes as $index => $variacao) {
            $qtdVendas = 10 - $index;

            for ($i = 0; $i < $qtdVendas; $i++) {
                $usuarioId = $usuarios[$i % 2];

                $dadosVendas[] = [
                    'usuario_id' => $usuarioId,
                    'variacao_produto_id' => $variacao->id_variacao_produto,
                    'quantidade' => 1,
                    'preco_unitario' => $variacao->preco,
                    'valor_total' => $variacao->preco,
                    'cep' => '29194-000',
                    'estado' => 'ES',
                    'cidade' => 'Aracruz',
                    'bairro' => 'Centro',
                    'rua' => 'A',
                    'numero' => '10',
                    'complemento' => 'Teste',
                    'created_at' => now(),
                ];
            }
        }

        Venda::query()->insert($dadosVendas);

    }
}
