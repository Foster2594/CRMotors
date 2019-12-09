<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoCampana extends Model
{
    protected $fillable=[
        'idTipoCampana',
        'nombre'

    ];

    protected $primary_key = 'idTipoCampana';
    public $incrementing = true;

    protected $table = 'TipoCampana';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
