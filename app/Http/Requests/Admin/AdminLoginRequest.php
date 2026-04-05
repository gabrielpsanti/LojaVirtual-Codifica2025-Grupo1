<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'senha' => ['required', 'min:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Informe o e-mail.',
            'email.email' => 'Digite um email valido.',
            'senha.required' => 'Informe a senha.',
            'senha.min' => 'A senha deve ter pelo menos :min caracteres.',
        ];
    }
}
