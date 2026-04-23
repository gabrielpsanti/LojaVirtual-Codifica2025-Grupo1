@extends('layout.publico.layoutPublico')

@section('titulo-aba', 'Login')

@section('content')

    <div class="flex items-center justify-center min-h-full-screen mt-20">
        <main class="w-full max-w-sm">

            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h1>

                @if ($errors->any())
                    <div class="mb-4 rounded-md bg-red-100 p-3 text-red-700 text-center">
                        {{ $errors->first() }}
                    </div>
                @endif

                @if (session('sucesso'))
                    <div class="mb-4 rounded-md bg-green-100 p-3 text-green-700 text-center">
                        {{ session('sucesso') }}
                    </div>
                @endif

                <form action="{{ route('cliente.login') }}" method="POST" class="flex flex-col gap-4">
                    @csrf

                    <div class="flex flex-col">
                        <label for="email" class="text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" placeholder="exemplo@email.com" required
                            autofocus value="{{ old('email') }}" class="border border-gray-300 rounded-md p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="senha" class="text-sm font-medium text-gray-700 mb-1">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required
                            class="border border-gray-300 rounded-md p-2">
                    </div>

                    <button type="submit"
                        class="bg-slate-600 text-white font-semibold py-2 rounded-md mt-2 cursor-pointer hover:bg-slate-500">
                        Entrar
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">Não possui conta?
                        <a href="{{ route('cliente.registro.form') }}"
                            class="text-slate-600 font-semibold hover:text-slate-500">
                            Cadastre-se aqui
                        </a>
                    </p>
                </div>
            </div>
        </main>
        </div>
    @endsection
