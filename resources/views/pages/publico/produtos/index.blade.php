@extends('layout.publico.layoutPublico')

@section('titulo-aba', $titulo)

@section('content')
<form action="{{ route('publico.produtos.pesquisa') }}" method="GET" class="search-box">
    <input type="text" name="search" placeholder="Buscar produtos...">
    <button type="submit" class="search-btn"></button>
</form>

<h1>{{ $titulo }}</h1>

<div style="display: flex; flex-wrap: wrap; gap: 20px;">

@forelse ($produtos as $produto)

<a href="{{ route('publico.produtos.variacoes', $produto) }}">

<div style="border: 1px solid #ccc; padding: 10px; width: 200px;">
                
<img src="{{ $produto->imagem_apresentacao }}" width="100%">

<h3>{{ $produto->nome }}</h3>

<p>{{ $produto->descricao }}</p>

</div>
</a>

@empty

<p>Nenhum produto encontrado.</p>

@endforelse

</div>

@endsection