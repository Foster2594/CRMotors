<?php

namespace App\Http\Controllers;

use App\Canton;
use App\Distrito;
use App\Models\Cliente;
use App\Provincia;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //Contiene toda la informacion de los controladores de tipo combobox
    public function comClientes(Request $request)
    {
        $cliente = Cliente::pluck('name', 'nombre', 'apellido1');
        return $cliente;
    }

    public function provincia()
    {
        $provincias = Provincia::pluck('nombre', 'idProvincia');
        return $provincias;
    }

    public function canton(Request $request)
    {
        $cantones = Canton::where('idProvincia', $request->provincia)->get();
        return $cantones;
    }
//
    public function distrito(Request $request)
    {
        $distritos = Distrito::where('idCanton', $request->canton)->get();
        return $distritos;
    }

}
