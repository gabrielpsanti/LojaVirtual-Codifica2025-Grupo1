@extends('layout.publico.layoutPublico')

@section('titulo-aba', 'Área do Cliente')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg flex flex-col gap-6">
        <div class="pt-2">
            <a href="{{ route('cliente.perfil') }}"
                class="bg-slate-900 rounded-md px-4 py-2 text-white font-semibold hover:bg-slate-700">
                Acessar Perfil
            </a>
        </div>

        <section class="p-5">
            <h2 class="text-xl font-semibold mb-2">Compras Realizadas</h2>
            @if ($vendas->isEmpty())
                <p class="text-slate-600">Você ainda não possui compras realizadas.</p>
            @else
                <div class="flex flex-col gap-4">
                    @foreach ($vendas as $venda)
                        <section class="rounded-md border border-slate-200 p-4">
                            <span class="text-sm text-slate-500">
                                {{ $venda->created_at?->format('d/m/Y H:i') }}
                            </span>
                            <div class="flex gap-4 justify-between items-center">
                                <div class="mt-3 ">
                                    <p><span class="font-semibold">Produto: </span>{{ $venda->variacaoProduto?->produto?->nome ?? 'Produto removido' }}</p>
                                    <p><span class="font-semibold">Cor: </span>{{ $venda->variacaoProduto?->cor?->nome ?? '-' }}</p>
                                    <p><span class="font-semibold">Tamanho: </span>{{ $venda->variacaoProduto?->tamanho?->nome ?? '-' }}</p>
                                    <p><span class="font-semibold">Quantidade:</span> {{ $venda->quantidade }}</p>
                                    <p><span class="font-semibold">Total:</span> R$ {{ number_format((float) $venda->valor_total, 2, ',', '.') }}</p>
                                </div>

                                <img src="{{ $venda->variacaoProduto?->imagem }}" alt="Imagem do Produto" class="max-h-50">
                            </div>

                        </section>
                    @endforeach
                </div>

            @endif
        </section>
    </div>
@endsection
