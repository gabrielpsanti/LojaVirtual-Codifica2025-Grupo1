@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Cadastrar Categoria')
@section('titulo-header', 'Cadastrar Categoria')

@section('content')
    <section class="mx-auto max-w-[40vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Nova categoria</h2>
            <p class="text-sm text-slate-500">Preencha os dados abaixo para cadastrar uma nova categoria.</p>
        </div>

        <form action="{{ route('admin.categorias.store') }}" method="POST">
            @include('pages.admin.categorias.formCategoria', ['botao' => 'Salvar categoria'])
        </form>
    </section>
@endsection
