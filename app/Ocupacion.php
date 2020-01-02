<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    protected $fillable=[
        'idOcupacion',
        'nombre'

    ];

    protected $primary_key = 'idOcupacion';
    public $incrementing = true;

    protected $table = 'Ocupacion';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
