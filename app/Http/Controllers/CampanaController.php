<?php

namespace App\Http\Controllers;

use App\Campana;
use App\Canton;
use App\estadoCampana;
use App\Provincia;
use App\Sede;
use App\tipoCampana;
use Illuminate\Http\Request;

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
        $tipos=tipoCampana::pluck('nombre','idTipoCampana');
        $estados=estadoCampana::pluck('nombre','idEstadoCampana');
        $sedes=Sede::pluck('nombre','idSede');
        $provincias=Provincia::pluck('nombre','idProvincia');
        $cantones=Canton::pluck('nombre','idCanton');

        return view('CRM.campanas.create',compact('campanas','tipos','estados','sedes','provincias','cantones'));
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
            'idTipoCampana' =>'required',
            'idSede' =>'required',
            'idEstadoCampana' =>'required',
            'nombre' =>'required',
            'descripcion' =>'required',
            'idProvincia' =>'required',
            'idCanton' =>'required',
            'fechaInicio' =>'required|date',
            'fechaFinal' =>'required|date',
            'descuentoMinimo' =>'required|numeric',
            'descuentoMaximo' =>'required|numeric',
            'idEmpleadoCreador' =>'required',
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
        $tipos=tipoCampana::pluck('nombre','idTipoCampana');
        $estados=estadoCampana::pluck('nombre','idEstadoCampana');
        $sedes=Sede::pluck('nombre','idSede');
        $provincias=Provincia::pluck('nombre','idProvincia');
        $cantones=Canton::pluck('nombre','idCanton');
        $campana=Campana::where('idCampana',$campana)->first();

        return view('CRM.campanas.edit', compact('campanas','tipos','estados','sedes','provincias','cantones','campana'));
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
        $campana=Campana::where('idCampana',$campana)->first();
        $campana->update($request->all());
//        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('campanas.edit',$campana->idCampana)->with('info','Campana actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($campana)
    {
        $campana=Campana::where('idCampana',$campana)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
