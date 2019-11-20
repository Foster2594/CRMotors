<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model{
    protected $fillable=['idSede',
        'nombre',
        'telefono',
        'correo',
        'idProvincia',
        'idCanton',
        'idDistrito',
        'direccionExacta',
        'idEstadoSede',
    ];

    protected $primary_key = 'idSede';
    public $incrementing = true;

    protected $table = 'Sede';
    protected $connection ='sqlsrv';
    public $timestamps = false;

}
