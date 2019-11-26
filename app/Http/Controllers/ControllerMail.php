<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerMail extends Controller
{
    public function index()
    {
        $envio=Envio::paginate();

        return view('CRM.envio.index', compact('envio'));
    }



}
