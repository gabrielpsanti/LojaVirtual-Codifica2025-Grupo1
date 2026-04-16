<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo-aba')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100 text-slate-900">
    <div class="flex">

        <aside class="w-full max-w-50 bg-slate-900 text-slate-100">

            <div class="border-b border-slate-700 px-6 py-6 text-center ">
                <h2 class="mt-2 text-2xl font-bold">LOGO</h2>
            </div>

            <nav class="flex flex-col items-center gap-4 px-4 py-6">
                <a href="{{ route('admin.dashboard') }}"
                    class="border border-slate-600 w-40 rounded-2xl px-4 py-2 hover:bg-slate-700 hover:border-slate-100">
                    <span class="text-lg font-semibold">Dashboard</span>
                </a>

                <a href=""
                    class="border border-slate-600 w-40 rounded-2xl px-4 py-2 hover:bg-slate-700 hover:border-slate-100">
                    <span class="text-lg font-semibold">Variações</span>
                </a>

                <a href="{{ route('admin.produtos.index') }}"
                    class="border border-slate-600 w-40 rounded-2xl px-4 py-2 hover:bg-slate-700 hover:border-slate-100">
                    <span class="text-lg font-semibold">Produtos</span>
                </a>
                
                <a href="{{ route('admin.modelos.index') }}"
                    class="border border-slate-600 w-40 rounded-2xl px-4 py-2 hover:bg-slate-700 hover:border-slate-100">
                    <span class="text-lg font-semibold">Modelos</span>
                </a>

                <a href="{{ route('admin.categorias.index') }}"
                    class="border border-slate-600 w-40 rounded-2xl px-4 py-2 hover:bg-slate-700 hover:border-slate-100">
                    <span class="text-lg font-semibold">Categorias</span>
                </a>

                <a href="{{ route('admin.tamanhos.index') }}"
                    class="border border-slate-600 w-40 rounded-2xl px-4 py-2 hover:bg-slate-700 hover:border-slate-100">
                    <span class="text-lg font-semibold">Tamanhos</span>
                </a>

                <a href="{{ route('admin.cores.index') }}"
                    class="border border-slate-600 w-40 rounded-2xl px-4 py-2 hover:bg-slate-700 hover:border-slate-100">
                    <span class="text-lg font-semibold">Cores</span>
                </a>

            </nav>
        </aside>

        <div class="flex flex-col min-h-screen w-full">
            <header class="border-b border-slate-200 bg-white px-6 py-4 shadow-sm">
                <div class="flex items-center justify-between">

                    <p class="text-sm font-medium tracking-[3px] text-slate-500 ">PAINEL ADMINISTRATIVO</p>

                    <h1 class="text-3xl font-bold text-slate-800">@yield('titulo-header')</h1>

                    <div class="flex items-center gap-3">
                        <div class="rounded-xl bg-slate-100 px-4 py-2">
                            <p class="font-semibold text-slate-700">Olá, {{ auth()->user()->nome }}
                            </p>
                        </div>

                        <form action="{{ route('admin.logoutAdmin') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="cursor-pointer rounded-xl bg-slate-800 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-600">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="p-10">
                @yield('content')
            </main>

        </div>
    </div>
</body>

</html>
