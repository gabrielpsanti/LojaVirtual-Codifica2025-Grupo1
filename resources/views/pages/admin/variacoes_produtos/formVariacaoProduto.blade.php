@csrf
<div class="space-y-5">
    <div class="space-y-2">
        <label for="produto_id" class="text-sm font-semibold text-slate-700">Produto</label>
        <select name="produto_id" id="produto_id"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none">
            <option value="">Selecione um produto</option>
            @foreach ($produtos as $produto)
                <option value="{{ $produto->id_produto }}" @selected(old('produto_id', $variacaoProduto->produto_id ?? '') == $produto->id_produto)>
                    {{ $produto->nome }}
                </option>
            @endforeach
        </select>

        @error('produto_id')
            <p class="text-sm font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label for="cor_id" class="text-sm font-semibold text-slate-700">Cor</label>
        <select name="cor_id" id="cor_id"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none">
            <option value="">Selecione uma cor</option>
            @foreach ($cores as $cor)
                <option value="{{ $cor->id_cor }}" @selected(old('cor_id', $variacaoProduto->cor_id ?? '') == $cor->id_cor)>
                    {{ $cor->nome }}
                </option>
            @endforeach
        </select>

        @error('cor_id')
            <p class="text-sm font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label for="tamanho_id" class="text-sm font-semibold text-slate-700">Tamanho</label>
        <select name="tamanho_id" id="tamanho_id"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none">
            <option value="">Selecione um tamanho</option>
            @foreach ($tamanhos as $tamanho)
                <option value="{{ $tamanho->id_tamanho }}" @selected(old('tamanho_id', $variacaoProduto->tamanho_id ?? '') == $tamanho->id_tamanho)>
                    {{ $tamanho->nome }}
                </option>
            @endforeach
        </select>

        @error('tamanho_id')
            <p class="text-sm font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label for="imagem" class="text-sm font-semibold text-slate-700">Imagem</label>
        <input type="text" name="imagem" id="imagem" value="{{ old('imagem', $variacaoProduto->imagem ?? '') }}"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none"
            placeholder="Ex.: /assets/imagens/camiseta-azul-p.jpg">

        @error('imagem')
            <p class="text-sm font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label for="estoque" class="text-sm font-semibold text-slate-700">Estoque</label>
        <input type="number" name="estoque" id="estoque" min="0"
            value="{{ old('estoque', $variacaoProduto->estoque ?? '') }}"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none"
            placeholder="Ex.: 25">

        @error('estoque')
            <p class="text-sm font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label for="preco" class="text-sm font-semibold text-slate-700">Preço</label>
        <input type="number" name="preco" id="preco" min="0.01" step="0.01"
            value="{{ old('preco', $variacaoProduto->preco ?? '') }}"
            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none"
            placeholder="Ex.: 79.90">

        @error('preco')
            <p class="text-sm font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex items-center gap-3 pt-4">
    <button type="submit"
        class="cursor-pointer rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-500">
        {{ $botao }}
    </button>

    <a href="{{ route('admin.variacao_produtos.index') }}"
        class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-200">
        Cancelar
    </a>
</div>
