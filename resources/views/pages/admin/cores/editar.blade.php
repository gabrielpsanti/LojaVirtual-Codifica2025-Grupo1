@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Editar Cor')
@section('titulo-header', 'Editar Cor')

@section('content')
    <section class="mx-auto max-w-[40vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Editar cor</h2>
            <p class="text-sm text-slate-500">Atualize as informações da cor selecionada.</p>
        </div>

        <form action="{{ route('admin.cores.update', $cor) }}" method="POST">
            @method('PUT')
            @include('pages.admin.cores.formCor', ['botao' => 'Atualizar cor'])
        </form>
    </section>
@endsection
