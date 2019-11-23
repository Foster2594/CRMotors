<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $fillable=[
        'idEncabezadoCotizacion',
        'fechaCreacion',
        'idCliente',
        'idEmpleado',
        'numeroLineas',
        'idCampana',
        'idEstadoCotizacion',
        'subTotal',
        'montoDescuento',
        'impuestoVentas',
        'total',
    ];

    protected $primary_key = 'idEncabezadoCotizacion';
    public $incrementing = true;

    protected $table = 'EncabezadoCotizacion';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
