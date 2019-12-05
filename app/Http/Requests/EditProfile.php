<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfile extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'numeric',
            'password' => 'confirmed'
        ];

    }
    public function messages()
    {
        return [
            'phone.numeric' =>  'El teléfono solo debe contener números',

            'password.confirmed' => 'Las contraseñas deben coincidir',
            'password.min' => 'Las contraseñas deben ser de más caracteres',
        ];
    }
}
