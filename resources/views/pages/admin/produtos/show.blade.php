@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Detalhes do Produto')
@section('titulo-header', 'Detalhes do Produto')

@section('content')
    <section class="mx-auto max-w-[50vw] rounded-3xl bg-white p-8 shadow-sm">
        
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">
                {{ $produto->nome }}
            </h2>
            <p class="text-sm text-slate-500">
                Visualização completa do produto.
            </p>
        </div>

        <div class="space-y-4">

            <div>
                <img src="{{ $produto->imagem_apresentacao }}" class="w-64 rounded-xl">
            </div>

            <div>
                <strong>Descrição:</strong>
                <p class="text-slate-600">{{ $produto->descricao }}</p>
            </div>

            <div>
                <strong>Modelo:</strong>
                <p>{{ $produto->modelo->nome ?? '-' }}</p>
            </div>

            <div>
                <strong>Categoria:</strong>
                <p>{{ $produto->modelo->categoria->nome ?? '-' }}</p>
            </div>

        </div>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('admin.produtos.edit', $produto) }}"
               class="rounded-xl bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                Editar produto
            </a>

            <a href="{{ route('admin.produtos.index') }}"
               class="rounded-xl bg-gray-200 px-4 py-2 text-gray-700 hover:bg-gray-300">
                Voltar
            </a>
        </div>

    </section>
@endsection