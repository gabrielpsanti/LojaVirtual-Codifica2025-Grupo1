@extends('layout.admin.layoutAdmin')

@section('titulo-aba', 'Mais Vendidos')
@section('titulo-header', 'Mais Vendidos')

@section('content')
    <section class="w-full max-w-[95vw] mx-auto flex flex-col gap-4 w-200">
        <div class="rounded-3xl bg-white px-6 py-4 shadow-sm w-200 mx-auto">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Lista Completa</h2>
                <p class="text-sm text-slate-500">Ranking por ocorrências de vendas nas últimas 24 horas.</p>
                <p class="text-sm text-slate-500">Atualização automática a cada dez minutos.</p>
            </div>
        </div>

        <div class="overflow-hidden rounded-3xl bg-white shadow-sm mx-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-900 text-left text-xs font-semibold text-slate-200">
                    <tr>
                        <th class="px-6 py-4">RANK</th>
                        <th class="px-6 py-4">VARIAÇÃO</th>
                        <th class="px-6 py-4">OCORRÊNCIAS (24H)</th>
                        <th class="px-6 py-4">ATUALIZADO EM</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-300">
                    @forelse ($maisVendidos as $item)
                        <tr class="hover:bg-slate-100">
                            <td class="px-6 py-4 text-sm font-semibold text-slate-800">#{{ $item->ranking }}</td>
                            <td class="px-6 py-4 text-sm text-slate-700">
                                {{ $item->variacao?->produto?->nome ?? 'Produto removido' }}
                                | {{ $item->variacao?->cor?->nome ?? 'Cor removida' }}
                                | {{ $item->variacao?->tamanho?->nome ?? 'Tamanho removido' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">{{ $item->quantidade_vendas }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $item->updated_at?->format('d/m/Y H:i') ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-lg text-slate-500">
                                Nenhum dado de mais vendidos disponível no momento.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
