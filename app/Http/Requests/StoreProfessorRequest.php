<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfessorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:professores,email',
        'password' => 'required|min:8|confirmed',
        'telefone' => 'nullable|string|max:20',
        'area' => 'required|string',
        'descricao' => 'nullable|string',
        'portfolio' => 'nullable|url',
        'github' => 'nullable|url',
        ];
    }
}
