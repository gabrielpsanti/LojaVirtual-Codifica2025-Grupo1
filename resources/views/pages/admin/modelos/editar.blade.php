@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Editar Modelo')
@section('titulo-header', 'Editar Modelo')

@section('content')
    <section class="mx-auto max-w-[40vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Editar modelo</h2>
            <p class="text-sm text-slate-500">Atualize as informações do modelo selecionado.</p>
        </div>

        <form action="{{ route('admin.modelos.update', $modelo) }}" method="POST">
            @method('PUT')
            @include('pages.admin.modelos.formModelo', ['botao' => 'Atualizar modelo'])
        </form>
    </section>
@endsection
