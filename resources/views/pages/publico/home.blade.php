@extends('layout.publico.layoutPublico')

@section('titulo-aba', 'Home')

@section('content')

<form action="{{ route('publico.produtos.pesquisa') }}" method="GET" class="search-box">
    <input type="text" name="search" placeholder="Buscar produtos...">
    <button type="submit" class="search-btn"></button>
</form>


<h2>Mais vendidos</h2>

<div class="produtos">
    @forelse ($maisVendidos as $produto)
        <a href="{{ route('publico.produtos.variacoes', $produto) }}">

            <div class="produto-card">

                @if (!empty($produto->imagem_apresentacao))
                    <img src="{{ $produto->imagem_apresentacao }}" alt="{{ $produto->nome }}">
                @else
                    <div>Sem imagem</div>
                @endif

                <p><strong>{{ $produto->nome }}</strong></p>
                <p>Vendidos: {{ $produto->total_vendas }}</p>

            </div>

        </a>
    @empty
        <p>Nenhum produto vendido ainda.</p>
    @endforelse
</div>

<h1>Produtos</h1>

<div class="grid grid-cols-4 gap-6">
    @forelse ($produtos as $produto)
    <a class="bg-white flex flex-col gap-3 rounded-xl hover:scale-105 transition-all hover:shadow-xl" href="{{ route('publico.produtos.variacoes', $produto) }}">

            <div class="aspect-2/3 p-4 object-contain flex flex-col gap-2">

                @if (!empty($produto->imagem_apresentacao))
                    <img class="rounded-xl" src="{{ $produto->imagem_apresentacao }}" alt="{{ $produto->nome }}">
                @else
                    <div>Sem imagem</div>
                @endif

                <p class="text-green-700 font-semibold text-center text-lg">R$ {{ $produto->variacoes_min_preco }}</p>

                <div class="flex flex-col text-center text-gray-500 text-s underline decoration-1">

                    <p>{{ $produto->modelo?->categoria->nome ?? '' }} - {{ $produto->modelo?->nome ?? 'MODELO' }}</p>

                </div>

                <p class="indent-7">{{ $produto->descricao }}</p>

            </div>

        </a>
    @empty
        <div>
            Nenhum produto cadastrado.
        </div>
    @endforelse
</div>

@endsection
