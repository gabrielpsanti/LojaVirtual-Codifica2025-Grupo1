@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Modelos')
@section('titulo-header', 'Modelos')

@section('content')
    <section class="w-[60vw] mx-auto flex flex-col gap-4">
        <div class="flex flex-col rounded-3xl bg-white px-6 py-4 shadow-sm flex-row items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Gerenciamento de modelos</h2>
                <p class="text-sm text-slate-500">Cadastre, edite e remova os modelos disponíveis no sistema.</p>
            </div>

            <a href="{{ route('admin.modelos.create') }}"
                class="inline-flex items-center justify-center rounded-xl bg-slate-800 px-4 py-2 text-md font-semibold text-white hover:bg-slate-700">
                Novo modelo
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-900 text-left text-xs font-semibold text-slate-200">
                    <tr class="divide-slate-200">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">MODELO</th>
                        <th class="px-6 py-4">CATEGORIA</th>
                        <th class="px-6 py-4 text-right pr-[5.5rem]">AÇÕES</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-300">
                    @forelse ($modelos as $modelo)
                        <tr class="hover:bg-slate-100">
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $modelo->id_modelo }}</td>
                            <td class="px-6 py-4 text-md font-medium text-slate-800">{{ $modelo->nome }}</td>
                            <td
                                class="px-6 py-4 text-sm {{ $modelo->categoria?->nome ? 'text-slate-600' : 'font-medium text-red-600' }}">
                                {{ $modelo->categoria->nome ?? 'Categoria não encontrada' }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.modelos.edit', $modelo) }}"
                                        class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-600 hover:bg-slate-300">
                                        Editar
                                    </a>

                                    <form action="{{ route('admin.modelos.destroy', $modelo) }}" method="POST"
                                        onsubmit="return confirm('Deseja realmente excluir este modelo?');">
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
                            <td colspan="4" class="px-6 py-10 text-center text-lg text-slate-500">
                                Nenhum modelo cadastrado até o momento.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $modelos->links() }}
        </div>
    </section>
@endsection
