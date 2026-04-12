<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255', 'min:3', 'unique:cores,nome',]
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome da cor.',
            'nome.min' => 'O nome da cor deve ter pelo menos 3 caracteres.',
            'nome.max' => 'Nome muito grande.',
            'nome.unique' => 'Essa cor já está cadastrada.',
        ];
    }
}
