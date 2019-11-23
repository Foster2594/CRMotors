<?php

namespace App\Http\Controllers;

use App\Cotizacion;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones=Cotizacion::paginate();

        return view('CRM.cotizaciones.index', compact('cotizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idCotizacion=Cotizacion::max('idEncabezadoCotizacion');
        if ($idCotizacion==null){$idCotizacion=0;}
        $idCotizacion=$idCotizacion+1;

        return view('CRM.cotizaciones.create',compact('cotizaciones','idCotizacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cotizacion = Cotizacion::create($request->all());

        return redirect()->route('cotizaciones.index')->with('info','Sede guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function destroy($cotizacion)
    {
        $cotizacion=Cotizacion::where('idEncabezadoCotizacion',$cotizacion)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }

    //Logica de Negocio


}