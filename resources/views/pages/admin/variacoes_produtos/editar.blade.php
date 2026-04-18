@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Editar Variação')
@section('titulo-header', 'Editar Variação')

@section('content')
    <section class="mx-auto max-w-[50vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Editar variação</h2>
            <p class="text-sm text-slate-500">Atualize as informações da variação selecionada.</p>
        </div>

        <form action="{{ route('admin.variacao_produtos.update', $variacaoProduto) }}" method="POST">
            @method('PUT')
            @include('pages.admin.variacoes_produtos.formVariacaoProduto', ['botao' => 'Atualizar variação'])
        </form>
    </section>
@endsection
