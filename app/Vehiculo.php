<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model{
    protected $fillable=['idVehiculo',
        'idProveedor',
        'idTipoVehiculo',
        'codigo',
        'marca',
        'modelo',
        'parametroVersion',
        'annio',
        'cantidadDisponible',
        'fechaIngreso',
        'fechaSalida',
        'precio'
    ];
    protected $primary_key = 'idVehiculo';
    public $incrementing = true;

    protected $table = 'Vehiculo';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
