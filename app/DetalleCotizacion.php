<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model
{
    protected $fillable=[
        'idDetalleCotizacion',
        'idEncabezadoCotizacion',
        'idVehiculo',
        'cantidad',
        'porcentajeDescuento',
        'precio',
        'montoDescuento',
        'montoImpuesto',
        'montoTotal',
    ];

    protected $primary_key = 'idDetalleCotizacion';
    public $incrementing = true;

    protected $table = 'DetalleCotizacion';
    protected $connection ='sqlsrv';
    public $timestamps = false;



}
