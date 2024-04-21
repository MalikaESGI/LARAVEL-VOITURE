<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GestionUserRequest extends FormRequest
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
      
            $user = $this->route('user'); 
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'birthday' => ['required', 'date'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'role' => ['required', 'string', 'in:admin,user'],
            ];
    
            // Si l'utilisateur est en train de créer un nouvel utilisateur,
            // les champs de mot de passe sont requis
            if ($this->isMethod('post')) {
                $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
            }
    
            return $rules;
        }
}
