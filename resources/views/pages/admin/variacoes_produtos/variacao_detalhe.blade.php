@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Detalhes da Variação')
@section('titulo-header', 'Detalhes da Variação')

@section('content')
<section class="w-[75vw] mx-auto flex flex-col gap-4">

    <!-- HEADER -->
    <div class="flex rounded-3xl bg-white px-6 py-4 shadow-sm items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Detalhes da variação</h2>
            <p class="text-sm text-slate-500">
                Visualize todas as informações da variação selecionada.
            </p>
        </div>

        <a href="{{ route('admin.variacao_produtos.edit', $variacao->id_variacao_produto) }}"
           class="inline-flex items-center justify-center rounded-xl bg-slate-800 px-4 py-2 text-md font-semibold text-white hover:bg-slate-700">
            Editar
        </a>
    </div>

    <!-- BREADCRUMB-->
    <div class="text-sm text-slate-500 mb-2 px-2">
        <a href="{{ route('admin.produtos.index') }}" class="hover:underline">
            Produtos
        </a>

        <span class="mx-2">/</span>

        <a href="{{ route('admin.produtos.index') }}" class="hover:underline">
            {{ $produto->nome }}
        </a>

        <span class="mx-2">/</span>

        <span class="text-slate-700 font-medium">
            {{ $variacao->nome }}
        </span>
    </div>

    <!-- CARD PRINCIPAL -->
    <div class="rounded-3xl bg-white p-6 shadow-sm">

        <!-- PRODUTO RELACIONADO -->
        <div class="flex items-center gap-6 border-b pb-6 mb-6">
            <img src="{{ $produto->imagem_apresentacao }}"
                 class="h-24 w-24 rounded-xl object-cover border">

            <div>
                <p class="text-sm text-slate-500">Produto</p>
                <h3 class="text-lg font-semibold text-slate-800">
                    {{ $produto->nome }}
                </h3>

                <a href="{{ $produto->imagem_apresentacao }}"
                   target="_blank"
                   class="text-sm text-blue-600 hover:underline">
                    Ver imagem
                </a>
            </div>
        </div>

        <!-- DADOS DA VARIAÇÃO -->
        <div class="grid grid-cols-2 gap-6">

            <div>
                <p class="text-sm text-slate-500">ID</p>
                <p class="text-slate-800 font-medium">
                    {{ $variacao->id_variacao_produto }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Nome</p>
                <p class="text-slate-800 font-medium">{{ $produto->nome }}</p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Preço</p>
                <p class="text-slate-800 font-medium">
                    R$ {{ number_format($variacao->preco, 2, ',', '.') }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Estoque</p>
                <p class="text-slate-800 font-medium">{{ $variacao->estoque }}</p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Cor</p>
                <p class="text-slate-800 font-medium">
                    {{ $variacao->cor->nome ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Tamanho</p>
                <p class="text-slate-800 font-medium">
                    {{ $variacao->tamanho->nome ?? '-' }}
                </p>
            </div>

        </div>

    </div>

</section>
@endsection