<?php

namespace App\Http\Controllers;

use App\Campana;
use App\Cliente;
use App\Cotizacion;
use App\DetalleCotizacion;

use App\Empleado;
use App\empleados;
use App\Http\Requests\CotizacionRequest;
use App\Vehiculo;
use Barryvdh\DomPDF\PDF;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
            ->join('Empleado', 'EncabezadoCotizacion.idEmpleado', 'Empleado.idEmpleado')
            ->select('EncabezadoCotizacion.*', 'Cliente.nombre as nomcli', 'Cliente.apellido1 as ap1cli', 'Cliente.apellido2 as ap2cli'
                , 'Empleado.nombre as nomemp', 'Empleado.apellido1 as ap1emp', 'Empleado.apellido2 as ap2emp', 'Cliente.numeroCelular as tel')->paginate();
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
        $idCotizacion = Cotizacion::max('idEncabezadoCotizacion');
        if ($idCotizacion == null) {
            $idCotizacion = 0;
        }
        $idCotizacion = $idCotizacion + 1;
        $clientes=Cliente::pluck('nombre','idCliente');
return $clientes;
        return view('CRM.cotizaciones.create', compact('cotizaciones', 'idCotizacion','clientes'));
    }


//en esta vista se mostrara como crear una cotizacion totalmente nueva


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */



    // Esta vista dara un panorama mas amplio de la vista consulta index


    public function show($cotizacion)
    {
        $id=$cotizacion;
        $cotizacion = Cotizacion::where('idEncabezadoCotizacion', $cotizacion)->first();
        $detalles = DetalleCotizacion::where('idEncabezadoCotizacion', $id)->get();


        return view('CRM.cotizaciones.show', compact('cotizacion','detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cotizacion)
    {
        $cotizacion = Cotizacion::where('idEncabezadoCotizacion', $cotizacion)->first();
        return view('CRM.cotizaciones.edit', compact('cotizacion'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cotizacion)
    {
        $request->request->add(['idEncabezadoCotizacion' => $cotizacion]);
        $cotizacion = Cotizacion::where('idEncabezadoCotizacion', $cotizacion)->update($request->except('_token'));
//        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('cotizaciones.show',compact('cotizacion') )->with('info', 'Cotizacion actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    //al dar click en el icono de eliminar retornara la vista estandar y eliminara el valor
    public function destroy($cotizacion)
    {
        $detalle=DetalleCotizacion::where('idEncabezadoCotizacion', $cotizacion)->delete();
        $cotizacion = Cotizacion::where('idEncabezadoCotizacion', $cotizacion)->delete();

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

    //inserta cotizaciones
    public function nueva()
    {
        $idCotizacion = Cotizacion::max('idEncabezadoCotizacion');
        if ($idCotizacion == null) {
            $idCotizacion = 0;
        }
        $idCotizacion = $idCotizacion + 1;
        $vehiculos = Vehiculo::paginate();

        $clientes=Cliente::select(DB::raw("idCliente, concat(nombre,' ',apellido1) as nombreCompleto"))->pluck('nombreCompleto','idCliente');
        $campanas=Campana::where('IdEstadoCampana',1)->pluck('nombre','idCampana');
        $campanasG=Campana::get();//despliega todas las campanas
        $empleados=Empleado::select(DB::raw("idEmpleado, concat(nombre,' ',apellido1) as nombreCompleto"))->where('idDepartamento',2)->pluck('nombreCompleto','idEmpleado');

        return view('CRM.cotizaciones.nuevaCot', compact('cotizaciones', 'idCotizacion', 'vehiculos','clientes','campanas','empleados','campanasG'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //En esta funcion recibira los datos para guardarlos en la base de datos y enviar su respectiva notificacion por correo
    public function store(CotizacionRequest $request)
    {
        $idEncabezadoCotizacion = Cotizacion::max('idEncabezadoCotizacion');
        $idEncabezadoCotizacion = $idEncabezadoCotizacion + 1;
        //return response()->json($idSede);
        $request->request->add([
            'idEncabezadoCotizacion' => $idEncabezadoCotizacion,
            'idEstadoCotizacion' => 1
        ]);
        $idEncabezadoCotizacion = Cotizacion::create($request->all());
//        $insertadetalle=$this->detalle($request);
        $det = $request->detalle;
        $det = \GuzzleHttp\json_decode($det);

        foreach ($det as $linea) {
            $jsonlinea = \GuzzleHttp\json_decode($linea);
            $detalle = new DetalleCotizacion();
            $detalle->idDetalleCotizacion = $jsonlinea->idDetalleCotizacion;
            $detalle->idEncabezadoCotizacion = $request->idEncabezadoCotizacion;
            $detalle->idVehiculo = $jsonlinea->idVehiculo;
            $detalle->cantidad = $jsonlinea->cantidad;
            $detalle->porcentajeDescuento = $jsonlinea->porcentajeDescuento;
            $detalle->precio = $jsonlinea->precio;
            $detalle->montoDescuento = $jsonlinea->montoDescuento;
            $detalle->montoImpuesto = $jsonlinea->montoImpuesto;
            $detalle->montoTotal = $jsonlinea->montoTotal;
            $detalle->save();
        }

        return redirect()->route('cotizaciones.index')->with('info', 'Cotizacion guardada con éxito');
    }

    //Detalles de Cotizacion
    public function detalle(Request $request)
    {
        $det = $request->detalle;
        $det = \GuzzleHttp\json_decode($det);
        $detalle = new DetalleCotizacion();
        $detalle->idDetalleCotizacion = $det->idDetalleCotizacion;
        $detalle->idEncabezadoCotizacion = $request->idEncabezadoCotizacion;
        $detalle->idVehiculo = $det->idVehiculo;
        $detalle->cantidad = $det->cantidad;
        $detalle->porcentajeDescuento = $det->porcentajeDescuento;
        $detalle->precio = $det->precio;
        $detalle->montoDescuento = $det->montoDescuento;
        $detalle->montoImpuesto = $det->montoImpuesto;
        $detalle->montoTotal = $det->montoTotal;
        $detalle->save();

//        $flight = App\Flight::create(['name' => 'Flight 10']);
//        $idEncabezadoCotizacion = DetalleCotizacion::create($det);

        return $detalle;
    }

    public function create_pdf($cotizacion){
        $id=$cotizacion;
        $cotizacion = Cotizacion::where('idEncabezadoCotizacion', $cotizacion)->first();
        $detalles = DetalleCotizacion::where('idEncabezadoCotizacion', $id)->get();
        $cliente=Cliente::where('idCliente',$cotizacion->idCliente)->first();
//        return view('CRM.cotizaciones.show', compact('cotizacion','detalles'));
        $pdf = \PDF::loadView('CRM\cotizaciones\showlabel',compact('guide','cotizacion','detalles'));
        return $pdf->download('cotizacion.pdf');
    }

    public function cotizacionMail($cotizacion)
    {   $id=$cotizacion;
        $cotizacion = Cotizacion::where('idEncabezadoCotizacion', $cotizacion)->first();
        $detalles = DetalleCotizacion::where('idEncabezadoCotizacion', $id)->get();
        $cliente=Cliente::where('idCliente',$cotizacion->idCliente)->first();
        $data = ['user' => Auth()->id(),
            'cotizacion'=>$cotizacion,
            'detalles'=>$detalles,

            ];
        //return $detalles[0]->idVehiculo;
        $pdf=Vehiculo::where('codigo','=',$detalles[0]->idVehiculo)->first();
        ini_set('max_execution_time', 220);
        Mail::send('CRM\cotizaciones\showEmail',$data, function ($message) use ($cliente,$pdf) {

            $message->from('royalmotors.crm@gmail.com', 'Royal Motors');
            $message->to($cliente->correo)->subject('Cotizacion Royal Motors');
            $message->attach(public_path('\pdf\\'.$pdf->pdf));
        });

        return redirect()->back()->with('info', 'mensaje enviado con éxito');
    }
}
