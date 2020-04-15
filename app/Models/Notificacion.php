<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $fillable=[
        'idNotificacion',
        'idCampana',
        'idTipoCliente',
        'fechaInicio',
        'envio',
        'cantidadClientes',
        'metodoEnvio',
        'tipoCliente',
        'Genereo',
        'Edad',
        'Vehiculos',

    ];
    protected $primary_key = 'idNotificacion';
    protected $table = 'Notificaciones';
    public $timestamps = false;
}
