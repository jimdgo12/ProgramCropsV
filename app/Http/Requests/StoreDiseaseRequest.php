<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiseaseRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true; 
    }

    
    public function rules(): array
    {
        return [
            'nameCommon' => ['required', 'string', 'max:50', 'unique:diseases,nameCommon'], // Nombre común obligatorio y único
            'nameScientific' => ['required', 'string', 'max:200'],
            'description' => ['required', 'string'],
            'diagnosis' => ['required', 'string'],
            'symptoms' => ['required', 'string'],
            'transmission' => ['required', 'string'],
            'type' => ['required', 'string', 'max:50'],
            'image' => ['nullable', 'url', 'max:255'],
            
            
            'pesticide_ids.*' => ['exists:pesticides,id'], // Asegura que los IDs existan
        ];
    }
}