<?php

namespace App\Http\Controllers;

use App\Campana;
use App\Canton;

use App\estadoCampana;
use App\Http\Requests\CreateCampana;

use App\Distrito;

use App\Provincia;
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
        $provincias=Provincia::pluck('nombre','idProvincia');
        $cantones=Canton::pluck('nombre','idCanton');
        $distritos=Distrito::pluck('nombre','idDistrito');
        return view('CRM.campanas.create',compact('campanas','provincias','cantones','distritos'));
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
            'idCampana' =>'required',
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
        $campana=Campana::where('idCampana',$campana)->first();
        $provincias=Provincia::pluck('nombre','idProvincia');
        $cantones=Canton::pluck('nombre','idCanton');
        $distritos=Distrito::pluck('nombre','idDistrito');

        return view('CRM.campanas.edit', compact('campana','provincias','cantones','distritos'));
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
