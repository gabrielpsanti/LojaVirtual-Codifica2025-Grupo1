<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    @vite('resources/css/app.css')
</head>

<body>
    <main class="flex flex-col items-center max-auto gap-4">
        <h1 class="font-bold mt-20">Bem-vindo, {{ auth()->user()->nome }}</h1>

        <form action="{{ route('admin.logoutAdmin') }}" method="POST">
            @csrf
            <button type="submit" class="rounded-md bg-blue-600 p-2 font-semibold text-white cursor-pointer">
                Sair
            </button>
        </form>
    </main>
</body>

</html>
