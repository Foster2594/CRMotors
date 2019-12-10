<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable=[
        'idDepartamento',
        'nombre',
        'idSede'

    ];

    protected $primary_key = 'idDepartamento';
    public $incrementing = true;

    protected $table = 'Departamento';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
