<?php

namespace App\Http\Controllers;

use App\Canton;
use App\Distrito;
use App\estadoSede;
use App\Provincia;
use App\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes=Sede::paginate();

        return view('CRM.sedes.index', compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias=Provincia::get();
        $cantones=[];
        $distritos=[];
        $estados=estadoSede::pluck('nombre','idEstadoSede');
        return view('CRM.sedes.create',compact('sedes','provincias','cantones','distritos','estados'));
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

            'nombre' =>'required',
            'telefono'=>'required',
            'correo' =>'required|email',
            'idProvincia' =>'required',
            'idCanton' =>'required',
            'idDistrito' =>'required',
            'direccionExacta' =>'required',
            'idEstadoSede' =>'required',
        ]);

        $idSede = Sede::max('idSede');
        $idSede=$idSede+1;
        //return response()->json($idSede);
        $request->request->add(['idSede' => $idSede]);
        $sede = Sede::create($request->all());

        return redirect()->route('sedes.index')->with('info','Sede guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sede)
    {
        $provincias=Provincia::pluck('nombre','idProvincia');
        $cantones=Canton::pluck('nombre','idCanton');
        $distritos=Distrito::pluck('nombre','idDistrito');
        $sede=Sede::where('idSede',$sede)->first();
        return view('CRM.sedes.show', compact('sede','provincias','cantones','distritos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sede,Request $request)
    {

        $estados=estadoSede::pluck('nombre','idEstadoSede');
        $provincias=Provincia::pluck('nombre','idProvincia');
        $cantones=Canton::pluck('nombre','idCanton');
        $distritos=Distrito::pluck('nombre','idDistrito');
        $sede=Sede::where('idSede',$sede)->first();

        return view('CRM.sedes.edit', compact('sede','estados','provincias','cantones','distritos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sede)
    {
        $request->validate([

            'nombre' =>'required',
            'telefono'=>'required',
            'correo' =>'required|email',
            'idProvincia' =>'required',
            'idCanton' =>'required',
            'idDistrito' =>'required',
            'direccionExacta' =>'required',
            'idEstadoSede' =>'required',
        ]);
        //  return $request;
        $request->request->add(['idSede' => $sede]);

        $sede=Sede::where('idSede',$sede)->update($request->except('_token'));

//        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('sedes.index', compact('sede'))->with('info','Sede actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sede)
    {
        $sede=Sede::where('idSede',$sede)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
