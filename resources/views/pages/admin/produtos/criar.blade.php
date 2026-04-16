@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Cadastrar Produto')
@section('titulo-header', 'Cadastrar Produto')

@section('content')
    <section class="mx-auto max-w-[50vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Novo produto</h2>
            <p class="text-sm text-slate-500">Preencha os dados abaixo para cadastrar um novo produto.</p>
        </div>

        <form action="{{ route('admin.produtos.store') }}" method="POST">
            @include('pages.admin.produtos.formProduto', ['botao' => 'Salvar produto'])
        </form>
    </section>
@endsection
