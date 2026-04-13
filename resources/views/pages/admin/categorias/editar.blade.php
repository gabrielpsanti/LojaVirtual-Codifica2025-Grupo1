@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Editar Categoria')
@section('titulo-header', 'Editar Categoria')

@section('content')
    <section class="mx-auto max-w-[40vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Editar categoria</h2>
            <p class="text-sm text-slate-500">Atualize as informações da categoria selecionada.</p>
        </div>

        <form action="{{ route('admin.categorias.update', $categoria) }}" method="POST">
            @method('PUT')
            @include('pages.admin.categorias.formCategoria', ['botao' => 'Atualizar categoria'])
        </form>
    </section>
@endsection
