@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Editar Produto')
@section('titulo-header', 'Editar Produto')

@section('content')
    <section class="mx-auto max-w-[50vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Editar produto</h2>
            <p class="text-sm text-slate-500">Atualize as informações do produto selecionado.</p>
        </div>

        <form action="{{ route('admin.produtos.update', $produto) }}" method="POST">
            @method('PUT')
            @include('pages.admin.produtos.formProduto', ['botao' => 'Atualizar produto'])
        </form>
    </section>
@endsection
