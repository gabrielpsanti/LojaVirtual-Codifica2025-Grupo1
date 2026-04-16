@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Produtos')
@section('titulo-header', 'Produtos')

@section('content')
    <section class="w-[75vw] mx-auto flex flex-col gap-4">
        <div class="flex flex-col rounded-3xl bg-white px-6 py-4 shadow-sm flex-row items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Gerenciamento de produtos</h2>
                <p class="text-sm text-slate-500">Cadastre, edite e remova os produtos disponíveis no sistema.</p>
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

        <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-900 text-left text-xs font-semibold text-slate-200">
                    <tr class="divide-slate-200">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">PRODUTO</th>
                        <th class="px-6 py-4">MODELO</th>
                        <th class="px-6 py-4">FAIXA ETÁRIA</th>
                        <th class="px-6 py-4">GÊNERO</th>
                        <th class="px-6 py-4 text-right pr-[5.5rem]">AÇÕES</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-300">
                    @forelse ($produtos as $produto)
                        <tr class="hover:bg-slate-100">
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $produto->id_produto }}</td>
                            <td class="px-6 py-4 text-md font-medium text-slate-800">{{ $produto->nome }}</td>
                            <td
                                class="px-6 py-4 text-sm {{ $produto->modelo?->nome ? 'text-slate-600' : 'font-medium text-red-600' }}">
                                {{ $produto->modelo->nome ?? 'Modelo não encontrado' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $produto->faixa_etaria?->label() }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $produto->genero?->label() }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.produtos.edit', $produto) }}"
                                        class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-slate-600 hover:bg-slate-300">
                                        Editar
                                    </a>

                                    <form action="{{ route('admin.produtos.destroy', $produto) }}" method="POST"
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
                            <td colspan="7" class="px-6 py-10 text-center text-lg text-slate-500">
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
