@extends('layout.publico.layoutPublico')

@section('titulo-aba', $produto->nome)

@section('content')
    @php
        $variacaoInicial = $variacoes->first();
        $imagemInicial = $variacaoInicial['imagem'] ?? null;
    @endphp

    <div class="mx-auto max-w-6xl">
        <a class="text-sm text-blue-600" href="{{ route('publico.home') }}">
            Página Inicial
        </a>

        <p class="text-2xl text-slate-500 mb-6">PRODUTO</p>

        <div class="grid gap-6 grid-cols-2">
            <section class="shadow-sm">
                <div class="w-full h-[30rem] overflow-hidden rounded-md bg-slate-50">
                    <img id="variacaoImagem"
                        class="{{ empty($imagemInicial) ? 'hidden' : '' }} mx-auto h-full w-full object-contain object-center"
                        src="{{ $imagemInicial ?? '' }}" alt="Imagem do produto {{ $produto->nome }}">
                </div>
            </section>

            <section class="self-start rounded-lg bg-white px-8 py-6 shadow-2xl">
                @if ($variacoes->isEmpty())
                    <div class="text-sm text-slate-700">
                        Este produto não possui variações cadastradas.
                    </div>
                @else
                    <h1 class="mb-4 text-2xl font-semibold text-slate-900">{{ $produto->nome }}</h1>

                    <p class="mt-1 text-sm text-slate-400">Selecione cor e tamanho</p>

                    <form class="mt-4 space-y-4" method="POST" action="">
                        @csrf
                        <input type="hidden" name="variacao_produto_id" id="variacaoProdutoId"
                            value="{{ $variacaoInicial['id'] ?? '' }}">

                        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700" for="corId">Cor</label>
                                <select id="corId" class="w-full rounded-md border-slate-300 text-sm p-2 bg-slate-100">
                                    @foreach ($cores as $cor)
                                        <option value="{{ $cor['id'] }}" @selected(($variacaoInicial['cor_id'] ?? null) == $cor['id'])>
                                            {{ $cor['nome'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700" for="tamanhoId">Tamanho</label>
                                <select id="tamanhoId" class="w-full rounded-md border-slate-300 text-sm p-2 bg-slate-100">
                                </select>
                            </div>
                        </div>

                        <div class="mx-auto rounded-md bg-slate-100 p-3 text-sm w-[80%]">
                            <div class="flex items-center justify-between">
                                <span class="text-slate-600">Preço</span>
                                <span id="variacaoPreco" class="font-semibold text-green-700">
                                    R$ {{ $variacaoInicial['preco'] ?? '-' }}
                                </span>
                            </div>
                            <div class="mt-2 flex items-center justify-between">
                                <span class="text-slate-600">Estoque</span>
                                <span id="variacaoEstoque" class="font-semibold text-slate-900">
                                    {{ $variacaoInicial['estoque'] ?? '-' }}
                                </span>
                            </div>
                        </div>
                        @if (!empty($produto->descricao))
                            <div>
                                <p class="text-sm font-semibold">Descrição</p>
                                <p class=" text-sm text-slate-600">{{ $produto->descricao }}</p>
                            </div>
                        @endif
                        <div class="flex justify-end">
                            <button type="submit"
                                class="rounded-md bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700 cursor-pointer">
                                Comprar
                            </button>
                        </div>
                    </form>
                @endif
            </section>
        </div>
    </div>


    @if ($variacoes->isNotEmpty())
        <script>
            (function() {
                const variacoes = @json($variacoes);
                const variacaoInicial = variacoes[0] || null;
                const corSelect = document.getElementById('corId');
                const tamanhoSelect = document.getElementById('tamanhoId');
                const variacaoIdInput = document.getElementById('variacaoProdutoId');
                const precoEl = document.getElementById('variacaoPreco');
                const estoqueEl = document.getElementById('variacaoEstoque');
                const imagemEl = document.getElementById('variacaoImagem');
                const semImagemEl = document.getElementById('variacaoSemImagem');
                const variacoesPorCor = variacoes.reduce((grupos, variacao) => {
                    const corId = variacao.cor_id;

                    if (!grupos[corId]) {
                        grupos[corId] = [];
                    }

                    grupos[corId].push(variacao);

                    return grupos;
                }, {});

                function encontrarVariacaoSelecionada() {
                    const corId = Number(corSelect.value);
                    const tamanhoId = Number(tamanhoSelect.value);

                    return variacoes.find((variacao) =>
                        variacao.cor_id == corId && variacao.tamanho_id == tamanhoId
                    ) || null;
                }

                function preencherTamanhos(tamanhoSelecionado = null) {
                    const corId = Number(corSelect.value);
                    const tamanhos = variacoesPorCor[corId] || [];

                    tamanhoSelect.innerHTML = '';
                    tamanhoSelect.disabled = tamanhos.length == 0;

                    tamanhos.forEach((variacao) => {
                        const option = document.createElement('option');
                        option.value = variacao.tamanho_id;
                        option.textContent = variacao.tamanho_nome;
                        tamanhoSelect.appendChild(option);
                    });

                    const temTamanhoSelecionado = tamanhos.some((variacao) =>
                        variacao.tamanho_id == Number(tamanhoSelecionado)
                    );

                    tamanhoSelect.value = temTamanhoSelecionado ?
                        tamanhoSelecionado :
                        tamanhos[0].tamanho_id;
                }

                function atualizarVariacaoSelecionada() {
                    const variacao = encontrarVariacaoSelecionada();

                    variacaoIdInput.value = variacao.id;
                    precoEl.textContent = `R$ ${variacao.preco}`;
                    estoqueEl.textContent = variacao.estoque;
                    imagemEl.src = variacao.imagem || '';
                }

                if (variacaoInicial) {
                    corSelect.value = variacaoInicial.cor_id;
                    preencherTamanhos(variacaoInicial.tamanho_id);
                    atualizarVariacaoSelecionada();
                }

                corSelect.addEventListener('change', () => {
                    preencherTamanhos(tamanhoSelect.value);
                    atualizarVariacaoSelecionada();
                });

                tamanhoSelect.addEventListener('change', atualizarVariacaoSelecionada);
            })();
        </script>
    @endif
@endsection
