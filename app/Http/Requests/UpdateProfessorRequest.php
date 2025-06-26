<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfessorRequest extends FormRequest
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
           
        'nome' => 'required|string',
        'email' => 'required|email',
        'telefone' => 'nullable|string|max:20',
        'area_atuacao' => 'nullable|string',
        'anos_experiencia' => 'nullable|string|integer',
        'descricao' => 'nullable|string',
        'portfolio' => 'nullable|url',
    
        ];
    }
}
