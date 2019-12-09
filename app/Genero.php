<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable=[
        'idGenero',
        'nombre'

    ];

    protected $primary_key = 'idGenero';
    public $incrementing = true;

    protected $table = 'Genero';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
