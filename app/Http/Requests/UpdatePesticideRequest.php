<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePesticideRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true; 
    }

    
    public function rules(): array
    {
       $pesticideId = $this->route('pesticide')->id ?? null;

        return [
              'name' => ['required', 'string', 'max:100', Rule::unique('pesticides', 'name')->ignore($pesticideId)],
            'type' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'application_rate' => ['nullable', 'string', 'max:100'], 
            
            'disease_ids' => ['nullable', 'array'],
            'disease_ids.*' => ['exists:diseases,id'],
        ];
    }
}