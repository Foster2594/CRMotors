<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estadoProveedor extends Model
{
    protected $fillable=[
        'idEstadoProveedor',
        'nombre'

    ];

    protected $primary_key = 'idEstadoProveedor';
    public $incrementing = true;

    protected $table = 'EstadoProveedor';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
