@csrf
<div class="space-y-2">
    <label for="nome" class="text-sm font-semibold text-slate-700">Nome da categoria</label>
    <input type="text" name="nome" id="nome" value="{{ old('nome', $categoria->nome ?? '') }}"
        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none transition"
        placeholder="Ex.: Camisetas" autofocus>

    @error('nome')
        <p class="text-sm font-medium text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="flex items-center gap-3 pt-4">
    <button type="submit"
        class="cursor-pointer rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-500">
        {{ $botao }}
    </button>

    <a href="{{ route('admin.categorias.index') }}"
        class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-200">
        Cancelar
    </a>
</div>
