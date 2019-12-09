<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'idEmpleado'
        , 'cedula'
        , 'nombre'
        , 'apellido1'
        , 'apellido2'
        , 'idGenero'
        , 'telefonoCelular'
        , 'otroTelefono'
        , 'correo'
        , 'idProvincia'
        , 'idCanton'
        , 'idDistrito'
        , 'direccionExacta'
        , 'idSede'
        , 'idDepartamento'
        , 'idUsuario'
        , 'idEstadoEmpleado',
    ];

    protected $primary_key = 'idEmpleado';
    public $incrementing = true;

    protected $table = 'Empleado';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
}
