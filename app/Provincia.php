<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{

    protected $fillable=[
        'idProvincia',
        'nombre'

    ];

    protected $primary_key = 'idProvincia';
    public $incrementing = true;

    protected $table = 'Provincia';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
