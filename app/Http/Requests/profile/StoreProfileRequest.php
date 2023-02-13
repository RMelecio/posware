<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombres en obligatorio',
            'name.string' => 'El nombre debe ser texto',
            'description.required' => 'La descripción es obligatoria',
            'description.string' => 'La descripción debe ser texto',
        ];
    }
}
