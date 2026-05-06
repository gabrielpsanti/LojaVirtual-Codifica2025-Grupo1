@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Produtos')
@section('titulo-header', 'Produtos')

@section('content')
<section class="w-[75vw] mx-auto flex flex-col gap-4">

    <div class="flex flex-col rounded-3xl bg-white px-6 py-4 shadow-sm flex-row items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Gerenciamento de produtos</h2>
            <p class="text-sm text-slate-500">
                Cadastre, edite e remova os produtos disponíveis no sistema.
            </p>
        </div>

        <a href="{{ route('admin.produtos.create') }}"
           class="inline-flex items-center justify-center rounded-xl bg-slate-800 px-4 py-2 text-md font-semibold text-white hover:bg-slate-700">
            Novo produto
        </a>
    </div>

    @if (session('success'))
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-3xl bg-white px-6 py-5 shadow-sm">
        <form method="GET" action="{{ route('admin.produtos.index') }}" class="flex flex-col gap-4">
            <div>
                <label for="busca" class="mb-1 text-sm font-medium text-slate-700">Pesquisar produto</label>
                <input id="busca" name="busca" type="text" value="{{ $filtros['busca'] ?? '' }}"
                    placeholder="Produto, categoria ou modelo"
                    class="w-full rounded-xl border border-slate-300 px-3 py-2 text-sm text-slate-700">
            </div>

            <div class="grid grid-cols-5 gap-4">
                <div>
                    <label for="genero" class="mb-1 text-sm font-medium text-slate-700">Gênero</label>
                    <select id="genero" name="genero"
                        class="w-full rounded-xl border border-slate-300 px-3 py-2 text-sm text-slate-700">
                        <option value="">Todos</option>
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->value }}" @selected((string) ($filtros['genero'] ?? '') === (string) $genero->value)>
                                {{ $genero->label() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="categoria_id" class="mb-1 text-sm font-medium text-slate-700">Categoria</label>
                    <select id="categoria_id" name="categoria_id"
                        class="w-full rounded-xl border border-slate-300 px-3 py-2 text-sm text-slate-700">
                        <option value="">Todas</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id_categoria }}" @selected((string) ($filtros['categoria_id'] ?? '') === (string) $categoria->id_categoria)>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="modelo_id" class="mb-1 text-sm font-medium text-slate-700">Modelo</label>
                    <select id="modelo_id" name="modelo_id"
                        class="w-full rounded-xl border border-slate-300 px-3 py-2 text-sm text-slate-700">
                        <option value="">Todos</option>
                        @foreach ($modelos as $modelo)
                            <option value="{{ $modelo->id_modelo }}" @selected((string) ($filtros['modelo_id'] ?? '') === (string) $modelo->id_modelo)>
                                {{ $modelo->nome }}{{ $modelo->categoria?->nome ? ' (' . $modelo->categoria->nome . ')' : '' }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex gap-2">
                <button type="submit"
                    class="cursor-pointer rounded-xl bg-slate-800 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">
                    Filtrar
                </button>

                <a href="{{ route('admin.produtos.index') }}"
                    class="inline-flex items-center rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                    Limpar filtros
                </a>
            </div>
        </form>
    </div>

    <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
        <table class="w-full table-auto divide-y divide-slate-200">

            <thead class="bg-slate-900 text-left text-xs font-semibold text-slate-200">
                <tr class="divide-slate-200">
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">PRODUTO</th>
                    <th class="px-6 py-4">CATEGORIA</th>
                    <th class="px-6 py-4">GENERO</th>
                    <th class="px-6 py-4">MODELO</th>
                    <th class="px-6 py-4">FAIXA ETÁRIA</th>
                    <th class="px-6 py-4">IMAGEM</th>
                    <th class="px-6 py-4 text-right pr-[5.5rem]">AÇÕES</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-300">
                @forelse ($produtos as $produto)
                <tr class="hover:bg-slate-100">
                <td class="px-6 py-4 text-sm text-slate-500">{{ $produto->id_produto }}</td>
                <td class="px-6 py-4 text-md font-medium text-slate-800">{{ $produto->nome }}</td>
                <td class="px-6 py-4 text-sm text-slate-600">
                   {{ $produto->modelo?->categoria?->nome ?? '-' }}
                </td>
                <td class="px-6 py-4 text-sm text-slate-600">
                    {{ $produto->genero?->label() ?? '-' }}
                </td>
                <td class="px-6 py-4 text-sm text-slate-600">
                    {{ $produto->modelo?->nome ?? 'Modelo não encontrado' }}
                </td>
                <td class="px-6 py-4 text-sm text-slate-600">
                    {{ $produto->faixa_etaria?->label() ?? '-' }}
                </td>
                <td class="px-6 py-4 text-sm text-slate-600">
                    <a href="{{ $produto->imagem_apresentacao }}" target="_blank"
                       class="text-blue-600 hover:underline">
                        Ver imagem
                    </a>
                </td>
                <td class="px-6 py-4 min-w-[180px]">
                   <div class="flex justify-end gap-2">

        <a href="{{ route('admin.produtos.edit', $produto) }}"
           class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-600 hover:bg-slate-300">
            Editar
        </a>

        <form action="{{ route('admin.produtos.destroy', $produto) }}"
              method="POST"
              onsubmit="return confirm('Deseja realmente excluir este produto?');">
            @csrf
            @method('DELETE')

            <button type="submit"
                class="cursor-pointer rounded-xl border bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:border-red-800 hover:bg-red-500">
                Excluir
            </button>
        </form>

    </div>
</td>
                        </tr>
        @empty
            <tr>
                <td colspan="8" class="px-6 py-10 text-center text-lg text-slate-500">
                    Nenhum produto cadastrado até o momento.
                </td>
            </tr>
        @endforelse

        </tbody>
        </table>
    </div>

    <div>
        {{ $produtos->links() }}
    </div>

</section>
@endsection