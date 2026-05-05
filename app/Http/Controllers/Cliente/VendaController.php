<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\ClienteFinalizarCarrinhoRequest;
use App\Http\Requests\Cliente\ClienteFinalizarVendaRequest;
use App\Http\Requests\Cliente\ClienteVendaRequest;
use App\Models\Carrinho;
use App\Models\CarrinhoItem;
use App\Models\Venda;
use App\Models\VariacaoProduto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VendaController extends Controller
{
    public function store(ClienteVendaRequest $request)
    {
        $dados = $request->validated();
        $acao = $request->input('acao', 'adicionar_carrinho');

        $variacao = VariacaoProduto::query()
            ->with(['produto', 'cor', 'tamanho'])
            ->find($dados['variacao_produto_id']);

        if (!$variacao) {
            return back()
                ->withErrors(['variacao_produto_id' => 'Variação de produto não encontrada.'])
                ->withInput();
        }

        $quantidade = (int) $dados['quantidade'];

        if ($quantidade > (int) $variacao->estoque) {
            return back()
                ->withErrors(['quantidade' => 'Quantidade indisponível em estoque.'])
                ->withInput();
        }

        if ($acao === 'comprar_agora') {
            return redirect()->route('cliente.comprar.resumo', [
                'variacaoProduto' => $variacao->id_variacao_produto,
                'quantidade' => $quantidade,
            ]);
        }

        $usuarioId = Auth::guard('cliente')->id();
        $carrinho = $this->obterOuCriarCarrinhoAberto($usuarioId);

        $itemExistente = CarrinhoItem::query()
            ->where('carrinho_id', $carrinho->id_carrinho)
            ->where('variacao_produto_id', $variacao->id_variacao_produto)
            ->first();

        $novaQuantidade = $quantidade;

        if ($itemExistente) {
            $novaQuantidade = (int) $itemExistente->quantidade + $quantidade;

            if ($novaQuantidade > (int) $variacao->estoque) {
                return back()
                    ->withErrors(['quantidade' => 'A soma com o item já no carrinho ultrapassa o estoque disponível.'])
                    ->withInput();
            }

            $itemExistente->update([
                'quantidade' => $novaQuantidade,
                'preco_unitario_momento' => $variacao->preco,
            ]);
        } else {
            CarrinhoItem::query()->create([
                'carrinho_id' => $carrinho->id_carrinho,
                'variacao_produto_id' => $variacao->id_variacao_produto,
                'quantidade' => $quantidade,
                'preco_unitario_momento' => $variacao->preco,
            ]);
        }

        return redirect()
            ->route('cliente.carrinho.index')
            ->with('status', 'Item adicionado ao carrinho com sucesso.');
    }

    public function resumo(VariacaoProduto $variacaoProduto, int $quantidade)
    {
        $variacaoProduto->load(['produto', 'cor', 'tamanho']);

        if ($quantidade > (int) $variacaoProduto->estoque) {
            return redirect()
                ->route('publico.produtos.variacoes', $variacaoProduto->produto)
                ->withErrors(['quantidade' => 'Quantidade inválida para o estoque disponível.']);
        }

        $total = $variacaoProduto->preco * $quantidade;

        return view('pages.cliente.selecionada', [
            'variacao' => $variacaoProduto,
            'quantidade' => $quantidade,
            'total' => $total,
        ]);
    }

    public function finalizar(ClienteFinalizarVendaRequest $request)
    {
        $dados = $request->validated();

        DB::transaction(function () use ($dados) {
            $variacao = VariacaoProduto::query()
                ->lockForUpdate()
                ->find($dados['variacao_produto_id']);

            if (!$variacao) {
                throw ValidationException::withMessages([
                    'variacao_produto_id' => 'Variação de produto não encontrada.',
                ]);
            }

            if ((int) $dados['quantidade'] > (int) $variacao->estoque) {
                throw ValidationException::withMessages([
                    'quantidade' => 'Quantidade indisponível em estoque para finalizar a compra.',
                ]);
            }

            $quantidade = (int) $dados['quantidade'];
            $precoUnitario = (float) $variacao->preco;
            $valorTotal = $precoUnitario * $quantidade;

            $variacao->estoque = (int) $variacao->estoque - $quantidade;
            $variacao->save();

            Venda::query()->create([
                'usuario_id' => Auth::guard('cliente')->id(),
                'variacao_produto_id' => $variacao->id_variacao_produto,
                'quantidade' => $quantidade,
                'preco_unitario' => $precoUnitario,
                'valor_total' => $valorTotal,
                'cep' => $dados['cep'],
                'estado' => strtoupper($dados['estado']),
                'cidade' => $dados['cidade'],
                'bairro' => $dados['bairro'],
                'rua' => $dados['rua'],
                'numero' => $dados['numero'],
                'complemento' => $dados['complemento'] ?? null,
            ]);

            DB::table('mais_vendidos')->updateOrInsert(
                ['variacao_produto_id' => $variacao->id_variacao_produto],
                [
                    'quantidade_vendas' => DB::raw('quantidade_vendas + 1'),
                    'updated_at' => now(),
                ]
            );
        });

        return redirect()
            ->route('cliente.areaCliente')
            ->with('status', 'Compra finalizada com sucesso.');
    }

    public function carrinho()
    {
        $usuarioId = Auth::guard('cliente')->id();

        $carrinho = Carrinho::query()
            ->where('usuario_id', $usuarioId)
            ->where('flag_ativo', true)
            ->with(['itens.variacaoProduto.produto', 'itens.variacaoProduto.cor', 'itens.variacaoProduto.tamanho'])
            ->first();

        $itens = $carrinho ? $carrinho->itens : collect();

        $total = $itens->sum(function (CarrinhoItem $item) {
            return (float) $item->preco_unitario_momento * (int) $item->quantidade;
        });

        return view('pages.cliente.carrinho', compact('carrinho', 'itens', 'total'));
    }

    public function atualizarQuantidade(CarrinhoItem $carrinhoItem)
    {
        $usuarioId = Auth::guard('cliente')->id();

        if ((int) $carrinhoItem->carrinho->usuario_id !== (int) $usuarioId) {
            abort(403);
        }

        $dados = request()->validate([
            'quantidade' => ['required', 'integer', 'min:1'],
        ], [
            'quantidade.required' => 'Informe a quantidade.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade mínima é 1.',
        ]);

        $variacao = $carrinhoItem->variacaoProduto;
        $novaQuantidade = (int) $dados['quantidade'];

        if ($novaQuantidade > (int) $variacao->estoque) {
            return back()->withErrors(['quantidade' => 'Quantidade indisponível para esta variação.']);
        }

        $carrinhoItem->update([
            'quantidade' => $novaQuantidade,
            'preco_unitario_momento' => $variacao->preco,
        ]);

        return back()->with('status', 'Quantidade atualizada.');
    }

    public function removerItem(CarrinhoItem $carrinhoItem)
    {
        $usuarioId = Auth::guard('cliente')->id();

        if ((int) $carrinhoItem->carrinho->usuario_id !== (int) $usuarioId) {
            abort(403);
        }

        $carrinhoItem->delete();

        return back()->with('status', 'Item removido do carrinho.');
    }

    public function finalizarCarrinho(ClienteFinalizarCarrinhoRequest $request)
    {
        $dadosEndereco = $request->validated();
        $usuarioId = Auth::guard('cliente')->id();

        DB::transaction(function () use ($usuarioId, $dadosEndereco) {
            $carrinho = Carrinho::query()
                ->where('usuario_id', $usuarioId)
                ->where('flag_ativo', true)
                ->with(['itens.variacaoProduto'])
                ->lockForUpdate()
                ->first();

            if (!$carrinho || $carrinho->itens->isEmpty()) {
                throw ValidationException::withMessages([
                    'carrinho' => 'Seu carrinho está vazio.',
                ]);
            }

            foreach ($carrinho->itens as $item) {
                $variacao = VariacaoProduto::query()
                    ->lockForUpdate()
                    ->find($item->variacao_produto_id);

                if (!$variacao) {
                    throw ValidationException::withMessages([
                        'carrinho' => 'Uma variação do carrinho não existe mais.',
                    ]);
                }

                if ((int) $item->quantidade > (int) $variacao->estoque) {
                    throw ValidationException::withMessages([
                        'carrinho' => 'Estoque insuficiente para um dos itens do carrinho.',
                    ]);
                }
            }

            foreach ($carrinho->itens as $item) {
                $variacao = VariacaoProduto::query()
                    ->lockForUpdate()
                    ->find($item->variacao_produto_id);

                $quantidade = (int) $item->quantidade;
                $precoUnitario = (float) $variacao->preco;
                $valorTotal = $precoUnitario * $quantidade;

                $variacao->estoque = (int) $variacao->estoque - $quantidade;
                $variacao->save();

                Venda::query()->create([
                    'usuario_id' => $usuarioId,
                    'variacao_produto_id' => $variacao->id_variacao_produto,
                    'quantidade' => $quantidade,
                    'preco_unitario' => $precoUnitario,
                    'valor_total' => $valorTotal,
                    'cep' => $dadosEndereco['cep'],
                    'estado' => strtoupper($dadosEndereco['estado']),
                    'cidade' => $dadosEndereco['cidade'],
                    'bairro' => $dadosEndereco['bairro'],
                    'rua' => $dadosEndereco['rua'],
                    'numero' => $dadosEndereco['numero'],
                    'complemento' => $dadosEndereco['complemento'] ?? null,
                ]);

                DB::table('mais_vendidos')->updateOrInsert(
                    ['variacao_produto_id' => $variacao->id_variacao_produto],
                    [
                        'quantidade_vendas' => DB::raw('quantidade_vendas + 1'),
                        'updated_at' => now(),
                    ]
                );
            }

            $carrinho->itens()->delete();
            $carrinho->update(['flag_ativo' => false]);
        });

        return redirect()
            ->route('cliente.areaCliente')
            ->with('status', 'Compra finalizada com sucesso.');
    }

    private function obterOuCriarCarrinhoAberto(int $usuarioId): Carrinho
    {
        return Carrinho::query()->firstOrCreate(
            [
                'usuario_id' => $usuarioId,
                'flag_ativo' => true,
            ],
            [
                'usuario_id' => $usuarioId,
                'flag_ativo' => true,
            ]
        );
    }
}
