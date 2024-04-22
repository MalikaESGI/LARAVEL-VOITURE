<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchVoitureRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
            return [
                'prix_location_journalier' => ['numeric', 'gte:0', 'nullable'],
                'nombre_de_place' => ['numeric', 'gte:2', 'nullable'],
                'marque' => ['string', 'nullable'],
                'model' => ['string', 'nullable'],
            ];
    }
}
