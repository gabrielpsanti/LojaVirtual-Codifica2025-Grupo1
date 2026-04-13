<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TamanhoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tamanho = $this->route('tamanho');

        return [
            'nome' => ['required', 'string', 'min:1', 'max:255', 'unique:tamanhos,nome'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome do tamanho.',
            'nome.min' => 'O nome do tamanho deve ter pelo menos 1 caractere.',
            'nome.max' => 'Nome muito grande.',
            'nome.unique' => 'Esse tamanho já está cadastrado.',
        ];
    }
}
