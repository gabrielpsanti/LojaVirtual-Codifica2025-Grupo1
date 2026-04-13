@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Editar Tamanho')
@section('titulo-header', 'Editar Tamanho')

@section('content')
    <section class="mx-auto max-w-[40vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Editar tamanho</h2>
            <p class="text-sm text-slate-500">Atualize as informações do tamanho selecionado.</p>
        </div>

        <form action="{{ route('admin.tamanhos.update', $tamanho) }}" method="POST">
            @method('PUT')
            @include('pages.admin.tamanhos.formTamanho', ['botao' => 'Atualizar tamanho'])
        </form>
    </section>
@endsection
