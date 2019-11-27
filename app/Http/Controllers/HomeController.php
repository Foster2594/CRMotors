<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //Contructor del HOme, verificado por midleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    //Muestra el dashboard de graficos y reportes de primera mano
    public function index()
    {
        return view('dashboard');
    }
}
