<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfile extends FormRequest
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
            'identification_type' =>  'required',
            'identification_card' =>  'required|unique:customers|max:15|numeric',
            'name' =>  'required|string|max:50',
            'last_name' =>  'required|string|max:150',
            'phone' =>  'required|unique:customers|max:25|numeric',
            'email' =>  'required|unique:customers|max:50|email:rfc,dns',
            'password.required' => 'required|confirmed'
        ];

    }
        public function messages()
    {
        return [
            'identification_type.required' =>  'Seleccione un tipo de cédula',

            'identification_card.unique' =>  'Cédula ya registrada',
            'identification_card.required' =>  'Debe ingresar la cédula',
            'identification_card.max' =>  'La cédula no debe ser mayor a 15 caracteres',
            'identification_card.numeric' =>  'La cédula debe ser únicamente contenida por números',


            'name.required' =>  'Debe ingresar el nombre',
            'name.string' =>  'El nombre debe ser únicamente contenido por letras',
            'name.max' =>  'El nombre no debe ser mayor a 50 caracteres',

            'last_name.required' =>  'Los apellidos deben ser registrados',
            'last_name.string' =>  'Los apellidos deben ser únicamente contenido por letras',
            'last_name.max' =>  'El nombre no debe ser mayor a 150 caracteres',

            'phone.required' =>  'Debe registrar un número telefónico',
            'phone.unique' =>  'El número telefónico debe ser único',
            'phone.max' =>  'El número telefónico no debe ser mayor a 25 caracteres',
            'phone.numeric' =>  'El número telefónico debe ser únicamente contenido por números',

            'email.unique' =>  'El correo ya existe',
            'email.required' =>  'Debe registrar un correo',
            'email.max' =>  'El correo no debe ser mayor a 50 caracteres',
            'email.numeric' =>  'El número telefónico debe ser únicamente contenido por números',

            'password.required' =>  'Debe ingresar una contraseña',
            'password.confirmed' =>  'Las contraseñas deben coincidir',
        ];
    }
}
