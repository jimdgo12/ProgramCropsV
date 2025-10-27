<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCropRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        
        $cropId = $this->route('crop')->id ?? null;

        return [
            
            'name' => ['required', 'string', 'max:50', Rule::unique('crops', 'name')->ignore($cropId)],
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