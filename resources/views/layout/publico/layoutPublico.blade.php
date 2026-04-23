<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo-aba', 'Loja Virtual')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100 text-slate-900">

<header class="border-b shadow-sm">
    <div class="mx-auto flex max-w-6xl justify-between p-2">

        <div class="flex items-center gap-5">
            <div class="font-bold text-lg">LOGO</div>

            <a href="#" class="hover:underline">Masculino</a>

            <a href="/produtos/femininos" class="hover:underline text-pink-600 font-semibold">
                Feminino
            </a>

            <a href="#" class="hover:underline">Kids</a>
    <header class="border-b shadow-sm">
        <div class="mx-auto flex max-w-6xl justify-between p-2">

            <div class="flex items-center gap-3">
                <div>LOGO</div>
                <div>Masculino</div>
                <div>Feminino</div>
                <div>Kids</div>
            </div>
            @if (auth()->check())
            <div class="flex gap-4 items-center">
                <p>Olá, <a href="{{ route('cliente.perfil') }}" class="text-bold text-slate-800 hover:text-slate-600">{{ auth()->user()->nome }}</a></p>
                <a class="font-semibold text-slate-800 text-lg" href="{{ route('cliente.logout') }}">
                    Sair
                </a>
            </div>
            @else
                <a href="{{ route('cliente.login.form') }}">
                    Login
                </a>
            @endif
        </div>

        <a href="#" class="hover:underline">Login</a>

    </div>
</header>

<main class="mx-auto max-w-[90%] py-10">
    @yield('content')
</main>

</body>

</html>
