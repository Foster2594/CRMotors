<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //Contiene toda la informacion de los controladores de tipo combobox
    public function comClientes(Request $request)
    {
        $cliente = Cliente::pluck('name', 'nombre', 'apellido1');
        return $cliente;
    }

//    public function provincia(Request $request)
//    {
//        $provincias = Province::pluck('name', 'id');
//        return $provincias;
//    }
//
//    public function canton(Request $request)
//    {
//        $cantones = Canton::where('province_id', $request->provincia)->get();
//        return $cantones;
//    }
//
//    public function distrito(Request $request)
//    {
//        $distritos = District::where('canton_id', $request->canton)->get();
//        return $distritos;
//    }


}
