<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCampana extends FormRequest
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
            'idTipoCampana' =>'required',
            'idSede' =>'required',
            'idEstadoCampana' =>'required',
            'nombre' =>'required',
            'descripcion' =>'required',
//            'idProvincia' =>'required',
//            'idCanton' =>'required',
            'fechaInicio' =>'required|date',
//            'fechaFinal' =>'required|date',
            'descuentoMinimo' =>'required|numeric',
            'descuentoMaximo' =>'required|numeric',
//            'idEmpleadoCreador' =>'required',


        ];

    }
    public function messages()
    {
        return [
            'idTipoCampana.required'  =>  'Debe seleccionar un tipo de campaña',
            'idSede.required' =>  'Debe seleccionar una sede',
            'idEstadoCampana.required' =>  'Debe seleccionar un estado campaña',
            'nombre.required' =>  'Debe ingresar un nombre',
            'descripcion.required' =>  'Debe ingresar una descripción',
//            'idProvincia.required' =>  'Debe seleccionar una provincia',
//            'idCanton.required' =>  'Debe seleccionar un cantón',
            'fechaInicio.required' =>  'Debe ingresar una fecha de inicio',
            'fechaInicio.date' =>  'Debe ingresar una fecha válida',
//            'fechaFinal.required' =>  'Debe ingresar una fecha de finalización',
            'descuentoMinimo.required' =>  'Debe ingresar una cantidad de descuento mínimo',
            'descuentoMinimo.numeric' =>  'Debe ingresar únicamente números en el descuento mínimo',
            'descuentoMaximo.required' =>  'Debe ingresar una cantidad de descuento máxima',
            'descuentoMaximo.numeric' =>  'Debe ingresar únicamente números en el descuento máximo',
//            'idEmpleadoCreador.required' =>  'Debe ingresar el nombre de la persona que lo aprueba',

        ];
    }
}
