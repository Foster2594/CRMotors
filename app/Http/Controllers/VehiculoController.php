<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\tipoVehiculo;
use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vehiculos=Vehiculo::paginate();

        return view('CRM.vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores=Proveedor::pluck('nombre','idProveedor');
        $tipos=tipoVehiculo::pluck('nombre','idTipoVehiculo');
        return view('CRM.vehiculos.create',compact('vehiculos','proveedores','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idProveedor' =>'required',
            'idTipoVehiculo' =>'required',
            'codigo' =>'required',
            'marca' =>'required',
            'modelo' =>'required',
            'parametroVersion' =>'required',
            'annio' =>'required|numeric|integer|digits:4',
            'cantidadDisponible' =>'required|numeric',
            'fechaIngreso' =>'required|date',
            'fechaSalida' =>'required|date',
            'precio' =>'required|numeric'
        ]);
        $idVehiculo = Vehiculo::max('idVehiculo');
        $idVehiculo=$idVehiculo+1;
        //return response()->json($idSede);
        $request->request->add(['idVehiculo' => $idVehiculo]);
        $vehiculo =  Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')->with('info','Vehiculo guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($vehiculo)
    {

        $vehiculo=Vehiculo::where('idVehiculo',$vehiculo)->first();
        return view('CRM.vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($vehiculo,Request $request)
    {

        $vehiculo=Vehiculo::where('idVehiculo',$vehiculo)->first();
        $proveedores=Proveedor::pluck('nombre','idProveedor');
        $tipos=tipoVehiculo::pluck('nombre','idTipoVehiculo');
        return view('CRM.vehiculos.edit',compact('vehiculo','proveedores','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vehiculo)
    {
        $request->validate([
            'idProveedor' =>'required',
            'idTipoVehiculo' =>'required',
            'codigo' =>'required',
            'marca' =>'required',
            'modelo' =>'required',
            'parametroVersion' =>'required',
            'annio' =>'required|numeric|integer|digits:4',
            'cantidadDisponible' =>'required|numeric|integer|min:1',
            'fechaIngreso' =>'required|date',
            'fechaSalida' =>'required|date',
            'precio' =>'required|numeric'
        ]);
        $vehiculo=Vehiculo::where('idVehiculo',$vehiculo)->update($request->except('_token','_method'));
//        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('vehiculos.index',$vehiculo)->with('info','Vehiculo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($vehiculo)
    {
        $vehiculo=Vehiculo::where('idVehiculo',$vehiculo)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }

//    public function select()
//    {
//
//        $vehiculos=Vehiculo::paginate();
//
//        return view('CRM.vehiculos.select', compact('vehiculos'));
//    }




}
