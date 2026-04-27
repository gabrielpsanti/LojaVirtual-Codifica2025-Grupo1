<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\ClienteFinalizarVendaRequest;
use App\Http\Requests\Cliente\ClienteVendaRequest;
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

        $variacao = VariacaoProduto::query()
            ->with(['produto', 'cor', 'tamanho'])
            ->find($dados['variacao_produto_id']);

        if (!$variacao) {
            return back()
                ->withErrors(['variacao_produto_id' => 'Variação de produto não encontrada.'])
                ->withInput();
        }

        if ($dados['quantidade'] > $variacao->estoque) {
            return back()
                ->withErrors(['quantidade' => 'Quantidade indisponível em estoque.'])
                ->withInput();
        }

        $quantidade = (int) $dados['quantidade'];

        return redirect()->route('cliente.comprar.resumo', [
            'variacaoProduto' => $variacao->id_variacao_produto,
            'quantidade' => $quantidade,
        ]);
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


            if ($dados['quantidade'] > $variacao->estoque) {
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
        });

        return redirect()->route('cliente.areaCliente');
    }
}
