<?php

namespace App\Http\Controllers;

use App\Cotizacion;
use App\Vehiculo;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //en esta fucnion retornara la vista correspondiente a la consulta general
    public function index()
    {
        $cotizaciones = Cotizacion::join('Cliente', 'EncabezadoCotizacion.idCliente', 'Cliente.idCliente')
            ->join('Empleado','EncabezadoCotizacion.idEmpleado','Empleado.idEmpleado')
            ->select('EncabezadoCotizacion.*','Cliente.nombre as nomcli','Cliente.apellido1 as ap1cli','Cliente.apellido2 as ap2cli'
                ,'Empleado.nombre as nomemp','Empleado.apellido1 as ap1emp','Empleado.apellido2 as ap2emp','Cliente.numeroCelular as tel')->paginate();
//        $cotizaciones = Cotizacion::paginate();
//        return response()->json($cotizaciones);


        return view('CRM.cotizaciones.index', compact('cotizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //en esta se migrara la vista de crear un encabezado solamente
    public function create()
    {
        $idCotizacion=Cotizacion::max('idEncabezadoCotizacion');
        if ($idCotizacion==null){$idCotizacion=0;}
        $idCotizacion=$idCotizacion+1;

        return view('CRM.cotizaciones.create',compact('cotizaciones','idCotizacion'));
    }
//en esta vista se mostrara como crear una cotizacion totalmente nueva
    public function nueva()
    {
        $idCotizacion=Cotizacion::max('idEncabezadoCotizacion');
        if ($idCotizacion==null){$idCotizacion=0;}
        $idCotizacion=$idCotizacion+1;

        $vehiculos=Vehiculo::paginate();

        return view('CRM.cotizaciones.nuevaCot',compact('cotizaciones','idCotizacion','vehiculos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //En esta funcion recibira los datos para guardarlos en la base de datos y enviar su respectiva notificacion por correo
    public function store(Request $request)
    {
        $idEncabezadoCotizacion = Cotizacion::max('idEncabezadoCotizacion');
        $idEncabezadoCotizacion=$idEncabezadoCotizacion+1;
        //return response()->json($idSede);
        $request->request->add(['idEncabezadoCotizacion' => $idEncabezadoCotizacion,
                                'idEstadoCotizacion'=>1

            ]);
        $idEncabezadoCotizacion = Cotizacion::create($request->all());


        return redirect()->route('cotizaciones.index')->with('info','Sede guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   // Esta vista dara un panorama mas amplio de la vista consulta index
    public function show($cotizacion)
    {
        $cotizacion=Cotizacion::where('idEncabezadoCotizacion',$cotizacion)->first();
        return view('CRM.cotizaciones.show', compact('cotizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cotizacion)
    {

        $cotizacion=Cotizacion::where('idEncabezadoCotizacion',$cotizacion)->first();

        return view('CRM.cotizaciones.edit', compact('cotizacion'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cotizacion)
    {
        $cotizacion=Cotizacion::where('idEncabezadoCotizacion',$cotizacion)->first();
        $cotizacion->update($request->all());
//        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('cotizaciones.edit',$cotizacion->idEncabezadoCotizacion)->with('info','Sede actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //al dar click en el icono de eliminar retornara la vista estandar y eliminara el valor
    public function destroy($cotizacion)
    {
        $cotizacion=Cotizacion::where('idEncabezadoCotizacion',$cotizacion)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }

    public function select()
    {

        $vehiculos=Vehiculo::paginate();

        return view('CRM.cotizaciones.select', compact('vehiculos'));
    }

    public function showv($vehiculo)
    {

        $vehiculo=Vehiculo::where('idVehiculo',$vehiculo)->first();
        return view('CRM.vehiculos.show', compact('vehiculo'));
    }

    public function agregar($vehiculo)
    {

        $vehiculo=Vehiculo::where('idVehiculo',$vehiculo)->first();

        return back()->with('vehiculo') ;
    }
}