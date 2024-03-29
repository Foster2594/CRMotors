<?php

namespace App\Http\Controllers;

use App\Campana;
use App\Canton;
use App\Genero;
use App\Models\Notificacion;
use App\Sede;
use App\estadoCampana;
use App\Http\Requests\CreateCampana;
use App\Empleado;
use App\empleados;
use App\Distrito;
use App\Cliente;

use App\Provincia;
use App\tipoCampana;
use App\Vehiculo;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class CampanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campanas=Campana::where('idEstadoCampana',1)->paginate();

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
        $genero=Genero::pluck('nombre','idGenero');
        $vehiculos=Vehiculo::pluck('codigo','idVehiculo');

        return view('CRM.campanas.create',
            compact('campanas','sedes','tipos','estados','provincias','cantones','distritos','genero','vehiculos'));
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
//            'idProvincia' =>'required',
//            'idCanton'=>'required',
            'fechaInicio'=>'required|date',
//            'fechaFinal'=>'required|date',
            'descuentoMinimo'=>'required|numeric',
            'descuentoMaximo'=>'required|numeric',
//            'idEmpleadoCreador' =>'required',
//            'idEmpleadoAprobador'=>'required',

        ]);

        $idCampana= Campana::max('idCampana');
        $idCampana = $idCampana+1;
        //return response()->json($idCampana);
        $request->request->add(['idCampana' => $idCampana,
                                'id' => $idCampana, ]);
        $campana = Campana::create($request->all());
        $notificacion=Notificacion::create($request->all());
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
    public function edit($campana, request $request)
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
        $request->validate([
            'idTipoCampana' =>'required',
            'idSede'=>'required',
            'idEstadoCampana'=>'required',
            'nombre' =>'required',
            'descripcion'=>'required',
//            'idProvincia' =>'required',
//            'idCanton'=>'required',
            'fechaInicio'=>'required|date',
//            'fechaFinal'=>'required|date',
            'descuentoMinimo'=>'required|numeric',
            'descuentoMaximo'=>'required|numeric',
//            'idEmpleadoCreador' =>'required',
//            'idEmpleadoAprobador'=>'required',

        ]);
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
    {
        try{

        ini_set('max_execution_time', 180);
        $campana = Campana::where('idCampana', $campana)->first();
        $notificacion=Notificacion::where('id',$campana->idCampana)->first();
        $data = ['idCampana' => Auth()->id(),
            'campana'=>$campana,
            'detalles'=>$notificacion,
//
        ];
        $year=today()->year-$notificacion->edad;
        $clientes=Cliente::where(['notificaciones'=>1],['idGenero'=>$notificacion->genero])->whereYear('fechaNacimiento', '<=', $year)->take($notificacion->cantidadCliente)->get();

        $cont=0;
        foreach ($clientes as $cliente){
//            return $cliente->correo;

            Mail::send('CRM\campanas\showEmail',$data, function ($message) use ($cliente,$campana) {
                $message->from('royalmotors.crm@gmail.com', 'Royal Motors');
                $message->to($cliente->correo)->subject('Campañas Royal Motors '.$campana->nombre);

                sleep(3);
            });
            if($cont==10){
                break;
            }
            $cont++;
        }
        }catch (Exception $exception){
            return redirect()->back()->with('info', 'mensaje enviado con exito');
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
        $campana=Campana::where('idCampana',$campana)->update(['idEstadoCampana'=>0]);

        return back()->with('info', 'Eliminado correctamente');
    }
}
