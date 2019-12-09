<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estadoEmpleado extends Model
{
    protected $fillable=[
        'idEstadoEmpleado',
        'nombre'

    ];

    protected $primary_key = 'idEstadoEmpleado';
    public $incrementing = true;

    protected $table = 'EstadoEmpleado';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
