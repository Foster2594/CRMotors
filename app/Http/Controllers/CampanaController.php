<?php

namespace App\Http\Controllers;

use App\Campana;
use App\Canton;
use App\Sede;
use App\estadoCampana;
use App\Http\Requests\CreateCampana;
use App\Empleado;
use App\empleados;
use App\Distrito;
use App\Cliente;

use App\Provincia;
use App\tipoCampana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CampanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campanas=Campana::paginate();

        return view('CRM.campanas.index', compact('campanas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sedes=Sede::pluck('nombre','idSede');
        $tipos=tipoCampana::pluck('nombre','idTipoCampana');
        $estados=estadoCampana::pluck('nombre','idEstadoCampana');
        $provincias=Provincia::pluck('nombre','idProvincia');
        $cantones=Canton::pluck('nombre','idCanton');
        $distritos=Distrito::pluck('nombre','idDistrito');
        return view('CRM.campanas.create',compact('campanas','sedes','tipos','estados','provincias','cantones','distritos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCampana $request)
    {
        $request->validate([
            'idTipoCampana' =>'required',
            'idSede'=>'required',
            'idEstadoCampana'=>'required',
            'nombre' =>'required',
            'descripcion'=>'required',
            'idProvincia' =>'required',
            'idCanton'=>'required',
            'fechaInicio'=>'required|date',
            'fechaFinal'=>'required|date',
            'descuentoMinimo'=>'required|numeric',
            'descuentoMaximo'=>'required|numeric',
            'idEmpleadoCreador' =>'required',
            'idEmpleadoAprobador'=>'required',

        ]);

        $idCampana= Campana::max('idCampana');
        $idCampana = $idCampana+1;
        //return response()->json($idCampana);
        $request->request->add(['idCampana' => $idCampana]);
        $campana = Campana::create($request->all());

        return redirect()->route('campanas.index')->with('info','Campana guardada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($campana)
    {
        $campana=Campana::where('idCampana',$campana)->first();
        return view('CRM.campanas.show', compact('campana'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($campana)
    {
        $sedes=Sede::pluck('nombre','idSede');
        $tipos=tipoCampana::pluck('nombre','idTipoCampana');
        $estados=estadoCampana::pluck('nombre','idEstadoCampana');
        $provincias=Provincia::pluck('nombre','idProvincia');
        $cantones=Canton::pluck('nombre','idCanton');
        $distritos=Distrito::pluck('nombre','idDistrito');
        $campana=Campana::where('idcampana',$campana)->first();


        return view('CRM.campanas.edit', compact('campana','sedes','tipos','estados','provincias','cantones','distritos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $campana)
    {
        $request->request->add(['idcampana' => $campana]);

        $campana=Campana::where('idcampana',$campana)->update($request->except('_token'));
        //$campana=Campana::where('idCampana',$campana)->first();
        //$campana->update($request->all());
//        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('campanas.show', compact('campana'))->with('info','campaña actualizada con éxito');
        //return redirect()->route('campanas.edit',$campana->idCampana)->with('info','Campana actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enviaremail($campana)
    {   $id=$campana;
        $campana = Campana::where('idCampana', $campana)->first();
        $detalles = Campana::where('idCampana', $id)->get();
        $data = ['idCampana' => Auth()->id(),
            'campana'=>$campana,
            'detalles'=>$detalles,
//
        ];

        $clientes=Cliente::all();
        $cont=0;
        foreach ($clientes as $cliente){
//            return $cliente->correo;

            Mail::send('CRM\campanas\showEmail',$data, function ($message) use ($cliente) {
                $message->from('email@royalmotors.net', 'Styde.Net');
                $message->to($cliente->correo)->subject('Campañas Royal Motors');
                sleep(7);
            });
            if($cont==10){
                break;
            }
            $cont++;
        }

       //codigo viejo
        /*foreach ($clientes as $cliente){
        Mail::send('CRM\campanas\showEmail',$data, function ($message) use ($cliente) {

            $message->from('email@royalmotors.net', 'Styde.Net');
            $message->bcc($cliente->correo)->subject('Campañas Royal Motors');
        });
        }*/
        return redirect()->back()->with('info', 'mensaje enviado con exito');
    }
    //Detalles de Cotizacion
    public function detalle(Request $request)
    {
        $det = $request->detalle;
        $det = \GuzzleHttp\json_decode($det);
        $detalle = new Campana();

        $detalle->idCampana = $det->idCampana;
        $detalle->nombre = $request->nombre;
        $detalle->descripcion = $det->descripcion;
        $detalle->fechaInicio = $det->fechaInicio;
        $detalle->fechaFinal = $det->fechaFinal;
        $detalle->descuentoMinimo = $det->descuentoMinimo;
        $detalle->descuentoMaximo = $det->descuentoMaximo;


        $detalle->save();


        return $detalle;
    }
    public function destroy($campana)
    {
        $campana=Campana::where('idCampana',$campana)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
