<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSeedRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $seedId = $this->route('seed')->id ?? null;

        return [
            'varietyName' => ['required', 'string', 'max:100', Rule::unique('seeds', 'varietyName')->ignore($seedId)],
            'germinationRate' => ['required', 'integer', 'min:0', 'max:100'],
            'plantingDepth' => ['nullable', 'string', 'max:50'],
            'image' => ['nullable', 'url', 'max:255'],
            
            'crop_id' => ['required', 'integer', 'exists:crops,id'], 
        ];
    }
}