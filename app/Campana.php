<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campana extends Model
{
    protected $fillable=[
        'idCampana',
        'idTipoCampana',
        'idSede',
        'idEstadoCampana',
        'nombre',
        'descripcion',
        'idProvincia',
        'idCanton',
        'fechaInicio',
        'fechaFinal',
        'descuentoMinimo',
        'descuentoMaximo',
        'idEmpleadoCreador',
        'idEmpleadoAprobador',
    ];

    protected $primary_key = 'idCampana';
    public $incrementing = true;

    protected $table = 'Campana';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
