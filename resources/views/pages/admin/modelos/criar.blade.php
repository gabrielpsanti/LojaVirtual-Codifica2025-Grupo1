@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Cadastrar Modelo')
@section('titulo-header', 'Cadastrar Modelo')

@section('content')
    <section class="mx-auto max-w-[40vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Novo modelo</h2>
            <p class="text-sm text-slate-500">Preencha os dados abaixo para cadastrar um novo modelo.</p>
        </div>

        <form action="{{ route('admin.modelos.store') }}" method="POST">
            @include('pages.admin.modelos.formModelo', ['botao' => 'Salvar modelo'])
        </form>
    </section>
@endsection
