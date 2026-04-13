@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Cadastrar Tamanho')
@section('titulo-header', 'Cadastrar Tamanho')

@section('content')
    <section class="mx-auto max-w-[40vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Novo tamanho</h2>
            <p class="text-sm text-slate-500">Preencha os dados abaixo para cadastrar um novo tamanho.</p>
        </div>

        <form action="{{ route('admin.tamanhos.store') }}" method="POST">
            @include('pages.admin.tamanhos.formTamanho', ['botao' => 'Salvar tamanho'])
        </form>
    </section>
@endsection
