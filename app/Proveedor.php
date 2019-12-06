<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable=[
        'idProveedor',
        'cedula',
        'nombre',
        'numeroTelefono',
        'correo',
        'idEstadoProveedor',
    ];

    protected $primary_key = 'idProveedor';
    public $incrementing = true;

    protected $table = 'Proveedor';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
