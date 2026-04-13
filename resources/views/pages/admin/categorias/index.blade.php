@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Categorias')
@section('titulo-header', 'Categorias')

@section('content')
    <section class="w-[60vw] mx-auto flex flex-col gap-4">
        <div class="flex flex-col rounded-3xl bg-white px-6 py-4 shadow-sm flex-row items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Gerenciamento de categorias</h2>
                <p class="text-sm text-slate-500">Cadastre, edite e remova as categorias disponíveis no sistema.</p>
            </div>

            <a href="{{ route('admin.categorias.create') }}"
                class="inline-flex items-center justify-center rounded-xl bg-slate-800 px-4 py-2 text-md font-semibold text-white hover:bg-slate-700">
                Nova categoria
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-900 text-slate-200 text-left text-xs font-semibold">
                    <tr class="divide-slate-200">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">NOME</th>
                        <th class="px-6 py-4 text-right pr-[5.5rem]">AÇÕES</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-300">
                    @forelse ($categorias as $categoria)
                        <tr class="hover:bg-slate-100">
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $categoria->id_categoria }}</td>
                            <td class="px-6 py-4 text-md font-medium text-slate-800">{{ $categoria->nome }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.categorias.edit', $categoria) }}"
                                        class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 bg-white hover:bg-slate-300 hover:border-slate-600">
                                        Editar
                                    </a>

                                    <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST"
                                        onsubmit="return confirm('Deseja realmente excluir esta categoria?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="cursor-pointer border rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-500 hover:border-red-800">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-lg text-slate-500">
                                Nenhuma categoria cadastrada até o momento.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $categorias->links() }}
        </div>
    </section>
@endsection
