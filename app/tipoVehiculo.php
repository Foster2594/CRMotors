<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoVehiculo extends Model
{
    protected $fillable=[
        'idTipoVehiculo',
        'nombre'

    ];

    protected $primary_key = 'idTipoVehiculo';
    public $incrementing = true;

    protected $table = 'TipoVehiculo';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
