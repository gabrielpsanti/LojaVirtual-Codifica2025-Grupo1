@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Cadastrar Variação')
@section('titulo-header', 'Cadastrar Variação')

@section('content')
    <section class="mx-auto max-w-[50vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Nova variação</h2>
            <p class="text-sm text-slate-500">Preencha os dados abaixo para cadastrar uma nova variação.</p>
        </div>

        <form action="{{ route('admin.variacao_produtos.store') }}" method="POST">
            @include('pages.admin.variacoes_produtos.formVariacaoProduto', ['botao' => 'Salvar variação'])
        </form>
    </section>
@endsection
