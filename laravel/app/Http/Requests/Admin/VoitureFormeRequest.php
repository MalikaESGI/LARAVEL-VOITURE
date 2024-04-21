<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VoitureFormeRequest extends FormRequest
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
            'marque' => ['required','string','min:4'],
            'model' => ['required','string','min:4'],
            'plaque_dimmatriculation'=> ['required','string','min:6'],
            'nombre_de_place'=> ['required','integer','min:2'],
            'prix_location_journalier' =>['required','integer','min:0'],
        ];
    }
}