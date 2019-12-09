<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estadoCampana extends Model
{
    protected $fillable=[
        'idEstadoCampana',
        'nombre'

    ];

    protected $primary_key = 'idEstadoCampana';
    public $incrementing = true;

    protected $table = 'EstadoCampana';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
