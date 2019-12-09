<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    protected $fillable=[
        'idCanton',
        'idProvincia',
        'nombre'

    ];

    protected $primary_key = 'idCanton';
    public $incrementing = true;

    protected $table = 'Canton';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
