@extends('layout.publico.layoutPublico')

@section('titulo-aba', 'Resumo da Compra')

@section('content')
    <div class="mx-auto max-w-4xl space-y-6">
        <a class="text-sm text-blue-600" href="{{ route('publico.produtos.variacoes', $variacao->produto) }}">
            Voltar para variações
        </a>

        @if ($errors->any())
            <div class="rounded-md border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <section class="rounded-lg bg-white p-6 shadow-md">
            <h1 class="mb-4 text-2xl font-semibold text-slate-900">Resumo da compra</h1>

            <div class="grid gap-4 sm:grid-cols-2">
                <div class="space-y-1 text-sm">
                    <p><span class="font-semibold">Produto:</span> {{ $variacao->produto->nome }}</p>
                    <p><span class="font-semibold">Cor:</span> {{ $variacao->cor->nome }}</p>
                    <p><span class="font-semibold">Tamanho:</span> {{ $variacao->tamanho->nome }}</p>
                    <p><span class="font-semibold">Preço unitário:</span> R$
                        {{ number_format($variacao->preco, 2, ',', '.') }}</p>
                    <p><span class="font-semibold">Quantidade:</span> {{ $quantidade }}</p>
                    <p class="text-base">
                        <span class="font-semibold">Total:</span>
                        <span class="text-green-700">R$ {{ number_format($total, 2, ',', '.') }}</span>
                    </p>
                </div>

                <div class="h-56 overflow-hidden rounded-md bg-slate-100">
                    <img class="h-full w-full object-contain" src="{{ $variacao->imagem }}"
                        alt="Imagem da variação {{ $variacao->produto->nome }}">
                </div>
            </div>
        </section>

        <section class="rounded-lg bg-white p-6 shadow-md">
            <h2 class="mb-4 text-lg font-semibold text-slate-900">Endereço de destino</h2>

            <form method="POST" action="{{ route('cliente.comprar.finalizar') }}" class="grid gap-4 sm:grid-cols-2">
                @csrf
                <input type="hidden" name="variacao_produto_id" value="{{ $variacao->id_variacao_produto }}">
                <input type="hidden" name="quantidade" value="{{ $quantidade }}">

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

                <div class="sm:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-slate-700" for="complemento">Complemento</label>
                    <input id="complemento" name="complemento" type="text" value="{{ old('complemento') }}"
                        class="w-full rounded-md border-slate-300 p-2 text-sm bg-slate-100">
                </div>

                <div class="sm:col-span-2 flex justify-end">
                    <button type="submit"
                        class="rounded-md bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700 cursor-pointer">
                        Finalizar Compra
                    </button>
                </div>
            </form>
        </section>
    </div>
@endsection
