<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-400 flex items-center justify-center min-h-screen">
    <main class="w-full max-w-sm p-4">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h1>

            @if ($errors->any())
                <div class="mb-4 rounded-md bg-red-100 p-3 text-red-700 text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <div class="flex flex-col">
                    <label for="email" class="text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="seu@email.com" required autofocus
                        value="{{ old('email') }}" class="border border-gray-300 rounded-md p-2">
                </div>

                <div class="flex flex-col">
                    <label for="senha" class="text-sm font-medium text-gray-700 mb-1">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required
                        class="border border-gray-300 rounded-md p-2">
                </div>

                <button type="submit" class="bg-blue-600 text-white font-semibold py-2 rounded-md mt-2 cursor-pointer">
                    Entrar
                </button>
            </form>
        </div>
    </main>
</body>

</html>
