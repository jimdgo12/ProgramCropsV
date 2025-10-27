<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDiseaseRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
         $diseaseId = $this->route('disease')->id ?? null;

        return [
            'nameCommon' => ['required', 'string', 'max:50', Rule::unique('diseases', 'nameCommon')->ignore($diseaseId)],
            'nameScientific' => ['required', 'string', 'max:200'],
            'description' => ['required', 'string'],
            'diagnosis' => ['required', 'string'],
            'symptoms' => ['required', 'string'],
            'transmission' => ['required', 'string'],
            'type' => ['required', 'string', 'max:50'],
            'image' => ['nullable', 'url', 'max:255'],
            
            'pesticide_ids' => ['nullable', 'array'],
            'pesticide_ids.*' => ['exists:pesticides,id'],
        ];
    }
}