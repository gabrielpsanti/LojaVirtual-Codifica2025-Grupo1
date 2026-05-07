<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo-aba', 'Loja Virtual')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        /*barra pesqui.*/
        .search-box {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-box input {
            width: 350px;
            padding: 10px;
            border: 2px solid #ddd;
            border-right: none;
            border-radius: 8px 0 0 8px;
            outline: none;
        }

        .search-box input:focus {
            border-color: #ff6a00;
        }

        .search-btn {
            width: 45px;
            background-color: #ff6a00;
            border: 2px solid #ff6a00;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            position: relative;
        }

        /*círcul lupa*/
        .search-btn::before {
            content: "";
            position: absolute;
            width: 12px;
            height: 12px;
            border: 2px solid white;
            border-radius: 50%;
            top: 10px;
            left: 12px;
        }

        /*cabin*/
        .search-btn::after {
            content: "";
            position: absolute;
            width: 8px;
            height: 2px;
            background: white;
            transform: rotate(45deg);
            top: 22px;
            left: 22px;
        }

        .produtos {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .produto-card {
            border: 1px solid #eee;
            padding: 10px;
            border-radius: 10px;
            transition: 0.2s;
            background: white;
        }

        .produto-card:hover {
            transform: scale(1.03);
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .produto-card img {
            width: 100%;
            height: 320px;
            object-fit: contain;
            background: #f8f8f8;
        }

        .produto-preco {
            color: #ff6a00;
            font-weight: bold;
        }

        .produto-card p {
            margin: 4px 0;
        }

    </style>
</head>


<body class="bg-slate-100 text-slate-900">

    <header class="border-b shadow-sm">
        <div class="flex justify-between p-2 items-center max-w-6xl mx-auto">

            <div class="flex gap-4 items-center">
                <a href="{{ route('publico.home') }}">
                    <span class="font-bold text-lg">LOJA DO IDCAP</span>
                </a>

                <a href="/produtos/masculinos" class="hover:underline text-blue-600 font-semibold"">Masculino</a>

                <a href="/produtos/femininos" class="hover:underline text-pink-600 font-semibold">
                    Feminino
                </a>


            <div class="flex gap-4 items-center ml-auto">
                @if (auth('cliente')->check())
                    <div class="flex gap-4 items-center">

                            <p class="ml-150 flex items-center gap-3">
                                <a href="{{ route('cliente.areaCliente') }}"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-slate-200 text-slate-800 hover:bg-slate-300"
                                    aria-label="Perfil">
                                    <i class="fa-solid fa-user"></i>
                                </a>

                                <a class="font-semibold text-slate-800" href="{{ route('cliente.carrinho.index') }}">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>

                            </p>
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

        </div>
    </header>

    <main class="mx-auto max-w-[90%] py-10">
        @yield('content')
    </main>

</body>

</html>
