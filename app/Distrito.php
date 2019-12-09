<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $fillable=[
        'idDistrito',
        'idCanton',
        'idProvincia',
        'nombre'

    ];

    protected $primary_key = 'idDistrito';
    public $incrementing = true;

    protected $table = 'Distrito';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
