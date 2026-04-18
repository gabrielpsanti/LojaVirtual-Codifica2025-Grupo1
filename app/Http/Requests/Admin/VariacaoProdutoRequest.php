<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VariacaoProdutoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $variacaoProduto = $this->route('variacaoProduto');

        return [
            'produto_id' => [
                'required',
                'integer',
                'exists:produtos,id_produto',
                Rule::unique('variacoes_produtos', 'produto_id')
                    ->where(fn($query) => $query
                        ->where('cor_id', $this->input('cor_id'))
                        ->where('tamanho_id', $this->input('tamanho_id'))
                        ->whereNull('deleted_at'))
                    ->ignore($variacaoProduto?->id_variacao_produto, 'id_variacao_produto'),
            ],
            'cor_id' => ['required', 'integer', 'exists:cores,id_cor'],
            'tamanho_id' => ['required', 'integer', 'exists:tamanhos,id_tamanho'],
            'imagem' => ['required', 'string', 'max:255'],
            'estoque' => ['required', 'integer', 'min:0'],
            'preco' => ['required', 'numeric', 'min:0.01'],
        ];
    }

    public function messages(): array
    {
        return [
            'produto_id.required' => 'Selecione o produto da variação.',
            'produto_id.exists' => 'O produto selecionado é inválido.',
            'cor_id.required' => 'Selecione a cor da variação.',
            'cor_id.exists' => 'A cor selecionada é inválida.',
            'tamanho_id.required' => 'Selecione o tamanho da variação.',
            'tamanho_id.exists' => 'O tamanho selecionado é inválido.',
            'imagem.required' => 'Informe a imagem da variação.',
            'imagem.max' => 'O campo imagem permite no máximo 255 caracteres.',
            'estoque.required' => 'Informe o estoque da variação.',
            'estoque.integer' => 'O estoque deve ser um número inteiro.',
            'estoque.min' => 'O estoque não pode ser negativo.',
            'preco.required' => 'Informe o preço da variação.',
            'preco.numeric' => 'O preço deve ser um valor numérico.',
            'preco.min' => 'O preço deve ser maior que zero.',
            'produto_id.unique' => 'Já existe uma variação com este produto, cor e tamanho.',
        ];
    }
}
