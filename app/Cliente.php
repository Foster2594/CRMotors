<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $fillable=[
        'idCliente',
        'idTipoCliente',
        'cedula',
        'nombre',
        'apellido1',
        'apellido2',
        'idGenero',
        'idOcupacion',
        'numeroCelular',
        'otroTelefono',
        'correo',
        'fechaNacimiento',
        'ingresoSalarial',
        'idProvincia',
        'idCanton',
        'idDistrito',
        'direccionExacta',
        'idVehiculoInteres',
        'idEstadoCliente',
    ];

    protected $primary_key = 'idCliente';
    public $incrementing = true;

    protected $table = 'Cliente';
    protected $connection ='sqlsrv';
    public $timestamps = false;
}
