<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotizacionRequest extends FormRequest
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
            'idCliente' =>  'required',
            'idEmpleado' =>  'required',
            'idCampana' =>  'required',
            'numeroLineas' =>  'min:1',
            'total' =>  'min:1',
        ];

    }
    public function messages()
    {
        return [
            'idCliente.required' =>  'Seleccione un cliente',
            'idEmpleado.required' =>  'Seleccione un empleado',
            'idCampana.required' =>  'Seleccione una campana',
            'numeroLineas.min' =>  'Favor seleccione algun vehiculo',
            'total.min' =>  'No se pueden guardar cotizaciones en 0',
        ];
    }
}
