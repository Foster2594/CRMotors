<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $fillable=[
        'id',
        'idCampana',
        'idTipoCampana',
        'fechaNacimiento',
        'edad',
        'idGenero',
        'idVehiculo',
        'salario',
        'ocupacion',
        'cantidadClientes',
    ];
    protected $primary_key = 'idNotificacion';
    protected $table = 'Notificacion';
    public $timestamps = false;
}
