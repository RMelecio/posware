<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'alias' => 'required',
            'name' => 'required',
            'trade_name' => 'required',
            'fiscal_regime_id' => 'required|exists:cfdi_fiscal_regimes,id',
            'country_id' => 'required|exists:cfdi_countries,id',
            'state' => 'required',
            'municipality' => 'required',
            'location' => 'required',
            'settlement' => 'required',
            'postal_code' => 'required|exists:cfdi_postal_codes,postal_code',
            'address' => 'required',
            'mobil' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'alias.required' => 'El alias es obligatorio.',
            'name.required' => 'El nombre es obligatorio.',
            'trade_name.required' => 'La razón social es obligatoria.',
            'fiscal_regime_id.required' => 'El regimen fiscal es obligatorio.',
            'fiscal_regime_id.exists' => 'El regimen fiscal no existe.',
            'country_id.required' => 'El país es obligatorio.',
            'country_id.exists' => 'El país no existe.',
            'state.required' => 'El estado es obligatorio',
            'municipality.required' => 'El municipio es obligatorio.',
            'location.required' => 'La localidad es obligatoria.',
            'settlement.required' => 'La colonia es obligatoria.',
            'postal_code.required' => 'El código postal es obligatorio.',
            'postal_code.exists' => 'El código postal no existe.',
            'address.required' => 'La dirección es obligatoria.',
            'mobil.required' => 'El teléfono es obligatorio.',
            'email.required' => 'El correo electronico es obligatorio.',
            'email.email' => 'El correo electronico no tiene el formato adecuado.'
        ];
    }


}
