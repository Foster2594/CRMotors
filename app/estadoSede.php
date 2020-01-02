<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estadoSede extends Model
{
    protected $fillable=[
        'idEstadoSede',
        'nombre'

    ];

    protected $primary_key = 'idEstadoSede';
    public $incrementing = true;

    protected $table = 'EstadoSede';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
