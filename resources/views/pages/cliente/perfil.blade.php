@extends('layout.publico.layoutPublico')

@section('titulo-aba', 'Meu Perfil')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-8">Meu Perfil</h1>

        <div>
            <div class="p-4">
                <h2 class="text-xlfont-semibold mb-4">Conta</h2>
                <div class="flex flex-col gap-4">
                    <div>
                        <p>Nome</p>
                        <p class="font-bold text-lg">{{ auth('cliente')->user()->nome }}</p>
                    </div>
                    <div>
                        <p>Email</p>
                        <p class="font-bold text-lg">{{ auth('cliente')->user()->email }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
