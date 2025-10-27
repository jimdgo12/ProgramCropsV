<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCropRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true; 
    }

    
    public function rules(): array
    {
        return [
            
            'name' => ['required', 'string', 'max:50', 'unique:crops,name'],
            'description' => ['required', 'string'],
            'nameScientific' => ['nullable', 'string', 'max:200'],
            'history' => ['nullable', 'string'],
            'phaseFertilizer' => ['required', 'string'],
            'phaseHarvest' => ['required', 'string'],
            'spreading' => ['nullable', 'string'],
            'image' => ['nullable', 'url', 'max:255'], 
            
            'disease_ids' => ['nullable', 'array'],
            
            'disease_ids.*' => ['exists:diseases,id'], 
            
            'fertilizer_ids' => ['nullable', 'array'],
            'fertilizer_ids.*' => ['exists:fertilizers,id'], 
        ];
    }
}