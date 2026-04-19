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

            <div class="flex items-center gap-3">
                <div>LOGO</div>
                <div>Masculino</div>
                <div>Feminino</div>
                <div>Kids</div>
            </div>

            <a href="">
                Login
            </a>

        </div>
    </header>

    <main class="mx-auto max-w-[90%] py-10">
        @yield('content')
    </main>
</body>

</html>
