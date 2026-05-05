@extends('layout.publico.layoutPublico')

@section('titulo-aba', 'Meu Carrinho')

@section('content')
    <div class="mx-auto max-w-5xl space-y-6">
        <h1 class="text-2xl font-semibold text-slate-900">Meu carrinho</h1>

        @if (session('status'))
            <div class="rounded-md border border-green-200 bg-green-50 px-3 py-2 text-sm text-green-700">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-md border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        @if ($itens->isEmpty())
            <section class="rounded-lg bg-white p-6 shadow-md">
                <p class="text-slate-700">Seu carrinho está vazio.</p>
                <a href="{{ route('publico.home') }}" class="mt-3 text-blue-600 hover:underline">Continuar comprando</a>
            </section>
        @else
            <section class="space-y-4 rounded-lg bg-white p-6 shadow-md">
                @foreach ($itens as $item)
                    @php
                        $variacao = $item->variacaoProduto;
                        $subtotal = (float) $item->preco_unitario_momento * (int) $item->quantidade;
                    @endphp

                    <section class="grid grid-cols-3 gap-4 rounded-md border border-slate-200 p-4">
                        <div class="h-24 overflow-hidden rounded-md bg-slate-100">
                            <img class="h-full w-full object-contain" src="{{ $variacao->imagem }}"
                                alt="Imagem da variação {{ $variacao->produto->nome }}">
                        </div>

                        <div class="space-y-1 text-sm">
                            <p class="font-semibold text-slate-900">{{ $variacao->produto->nome }}</p>
                            <p class="text-slate-600">Cor: {{ $variacao->cor->nome }}</p>
                            <p class="text-slate-600">Tamanho: {{ $variacao->tamanho->nome }}</p>
                            <p class="text-slate-600">Preço unitário: R$
                                {{ number_format($item->preco_unitario_momento, 2, ',', '.') }}</p>
                            <p class="font-semibold text-green-700">Subtotal: R$ {{ number_format($subtotal, 2, ',', '.') }}
                            </p>
                        </div>

                        <div class="flex flex-col items-end gap-2">
                            <form method="POST"
                                action="{{ route('cliente.carrinho.item.quantidade', $item->id_carrinho_item) }}"
                                class="flex items-center gap-2">
                                @csrf
                                <button name="quantidade" value="{{ max(1, (int) $item->quantidade - 1) }}" type="submit"
                                    class="rounded-md border border-slate-300 px-3 py-1 text-sm">-</button>
                                <span
                                    class="min-w-8 text-center text-sm font-semibold">{{ (int) $item->quantidade }}</span>
                                <button name="quantidade"
                                    value="{{ min((int) $variacao->estoque, (int) $item->quantidade + 1) }}" type="submit"
                                    class="rounded-md border border-slate-300 px-3 py-1 text-sm">+</button>
                            </form>

                            <form method="POST"
                                action="{{ route('cliente.carrinho.item.remover', $item->id_carrinho_item) }}">
                                @csrf
                                <button type="submit"
                                    class="text-sm text-red-600 cursor-pointer hover:underline">Remover</button>
                            </form>
                        </div>
                    </section>
                @endforeach
            </section>

            <section class="rounded-lg bg-white p-6 shadow-md">
                <div class="mb-4 flex items-center justify-between text-lg">
                    <span class="font-semibold">Total do carrinho</span>
                    <span class="font-bold text-green-700">R$ {{ number_format($total, 2, ',', '.') }}</span>
                </div>

                <h2 class="mb-4 text-lg font-semibold text-slate-900">Endereço de destino</h2>

                <form method="POST" action="{{ route('cliente.carrinho.finalizar') }}" class="grid gap-4 grid-cols-2">
                    @csrf

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700" for="cep">CEP</label>
                        <input id="cep" name="cep" type="text" value="{{ old('cep') }}"
                            class="w-full rounded-md border-slate-300 p-2 text-sm bg-slate-100">
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700" for="estado">Estado</label>
                        <input id="estado" name="estado" type="text" maxlength="2" value="{{ old('estado') }}"
                            class="w-full rounded-md border-slate-300 p-2 text-sm bg-slate-100">
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700" for="cidade">Cidade</label>
                        <input id="cidade" name="cidade" type="text" value="{{ old('cidade') }}"
                            class="w-full rounded-md border-slate-300 p-2 text-sm bg-slate-100">
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700" for="bairro">Bairro</label>
                        <input id="bairro" name="bairro" type="text" value="{{ old('bairro') }}"
                            class="w-full rounded-md border-slate-300 p-2 text-sm bg-slate-100">
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700" for="rua">Rua</label>
                        <input id="rua" name="rua" type="text" value="{{ old('rua') }}"
                            class="w-full rounded-md border-slate-300 p-2 text-sm bg-slate-100">
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700" for="numero">Número</label>
                        <input id="numero" name="numero" type="text" value="{{ old('numero') }}"
                            class="w-full rounded-md border-slate-300 p-2 text-sm bg-slate-100">
                    </div>

                    <div class="col-span-2">
                        <label class="mb-1 block text-sm font-medium text-slate-700" for="complemento">Complemento</label>
                        <input id="complemento" name="complemento" type="text" value="{{ old('complemento') }}"
                            class="w-full rounded-md border-slate-300 p-2 text-sm bg-slate-100">
                    </div>

                    <div class="col-span-2 flex justify-end">
                        <button type="submit"
                            class="rounded-md bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700 cursor-pointer">
                            Finalizar compra
                        </button>
                    </div>
                </form>
            </section>
        @endif
    </div>
@endsection
