@extends('layout.publico.layoutPublico')
@section('titulo-aba', 'Produtos Femininos')
@section('content')

<h1>Produtos Femininos</h1>
<div style="display: flex; flex-wrap: wrap; gap: 20px;">

@forelse ($produtos as $produto)

<div style="border: 1px solid #ccc; padding: 10px; width: 200px;">
                
<img src="{{ $produto->imagem_apresentacao }}" width="100%">

<h3>{{ $produto->nome }}</h3>

<p>{{ $produto->descricao }}</p>

</div>

@empty

<p>Nenhum produto encontrado.</p>

@endforelse

</div>

@endsection