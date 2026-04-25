@extends('layout.publico.layoutPublico')

@section('titulo-aba', 'Home')

@section('content')

<form action="{{ route('publico.produtos.pesquisa') }}" method="GET" class="search-box">
    <input type="text" name="search" placeholder="Buscar produtos...">
    <button type="submit" class="search-btn"></button>
</form>

<h1>Produtos</h1>

<div class="produtos">
    @forelse ($produtos as $produto)
    <a href="{{ route('publico.produtos.variacoes', $produto) }}">

            <div class="produto-card">

                @if (!empty($produto->imagem_apresentacao))
                    <img src="{{ $produto->imagem_apresentacao }}" alt="{{ $produto->nome }}">
                @else
                    <div>Sem imagem</div>
                @endif

                <p class="produto-preco">R$ {{ $produto->variacoes_min_preco }}</p>
                <p>{{ $produto->modelo?->categoria->nome ?? '' }}</p>
                <p>{{ $produto->modelo?->nome ?? 'MODELO' }}</p>
                <p>{{ $produto->descricao }}</p>

            </div>

        </a>
    @empty
        <div>
            Nenhum produto cadastrado.
        </div>
    @endforelse
</div>

@endsection
