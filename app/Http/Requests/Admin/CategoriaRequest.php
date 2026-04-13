<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'min:3', 'max:255', 'unique:categorias,nome'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome da categoria.',
            'nome.min' => 'O nome da categoria deve ter pelo menos 3 caracteres.',
            'nome.max' => 'Nome muito grande.',
            'nome.unique' => 'Essa categoria já está cadastrada.',
        ];
    }
}
