<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFertilizerRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true; 
    }

    
    public function rules(): array
    {
        $fertilizerId = $this->route('fertilizer')->id ?? null;
        
        return [
            'name' => ['required', 'string', 'max:100', Rule::unique('fertilizers', 'name')->ignore($fertilizerId)],
            'type' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'application_method' => ['nullable', 'string', 'max:100'],
            
             'crop_ids' => ['nullable', 'array'],
            'crop_ids.*' => ['exists:crops,id'],
        ];
    }
}