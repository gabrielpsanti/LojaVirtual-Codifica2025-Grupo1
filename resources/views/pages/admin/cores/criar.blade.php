@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Cadastrar Cor')
@section('titulo-header', 'Cadastrar Cor')

@section('content')
    <section class="mx-auto max-w-[40vw] rounded-3xl bg-white p-8 shadow-sm">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Nova cor</h2>
            <p class="text-sm text-slate-500">Preencha os dados abaixo para cadastrar uma nova cor.</p>
        </div>

        <form action="{{ route('admin.cores.store') }}" method="POST">
            @include('pages.admin.cores.formCor', ['botao' => 'Salvar cor'])
        </form>
    </section>
@endsection
