<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePesticideRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true; 
    }

    
    public function rules(): array
    {
        return [
            
            'name' => ['required', 'string', 'max:100', 'unique:pesticides,name'], // Nombre único y obligatorio
            'type' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'application_rate' => ['nullable', 'string', 'max:100'], // Campo opcional
            
            'disease_ids' => ['nullable', 'array'],
            'disease_ids.*' => ['exists:diseases,id'],
        ];
    }
}