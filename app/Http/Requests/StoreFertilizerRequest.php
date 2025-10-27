<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFertilizerRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true; 
    }

    
    public function rules(): array
    {
        return [
            
            'name' => ['required', 'string', 'max:100', 'unique:fertilizers,name'], // Nombre único y obligatorio
            'type' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'application_method' => ['nullable', 'string', 'max:100'],
            
            'crop_ids' => ['nullable', 'array'],
            'crop_ids.*' => ['exists:crops,id'],
        ];
    }
}