<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
    public function messages()
    {
        return [
            'idTipoCliente.required' => 'Seleccione un cliente',
            'idEmpleado.required' => 'Seleccione un empleado',
            'cedula.required' => 'Seleccione una campana',
            'nombre.required' => 'Seleccione una campana',
            'idCampana.required' => 'Seleccione una campana',
            'apellido1.required' => 'Seleccione una campana',
            'apellido2.required' => 'Seleccione una campana',
            'idGenero.required' => 'Seleccione una campana',
            'idOcupacion.required' => 'Seleccione una campana',
            'numeroCelular.numeric' => 'Solo numeros',
            'correo.email' => 'Debe digitar un correo valido',
            'fechaNacimiento.date' => 'Digite una fecha valida',
            'ingresoSalarial.numeric' => 'Seleccione una campana',
            'idProvincia.required' => 'Debe seleccionar una provincia',
            'idVehiculoInteres.required' => 'Favor seleccione algun vehiculo',

        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idTipoCliente' =>  'required',
            'idEmpleado' =>  'required',
            'cedula' =>  'required',
            'nombre' =>  'required',
            'apellido1' =>  'required',
            'apellido2' =>  'required',
            'idGenero' =>  'required',
            'idOcupacion' =>  'required',
            'numeroCelular' =>  'numeric',
            'correo' =>  'email',
            'fechaNacimiento' =>  'date',
            'ingresoSalarial' => 'numeric',
            'idProvincia' => 'required',
            'idVehiculoInteres' => 'required',

        ];
    }
}
