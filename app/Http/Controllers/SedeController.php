<?php

namespace App\Http\Controllers;

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

        return view('CRM.sedes.create',compact('sedes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $sede=Sede::where('idSede',$sede)->first();
        return view('CRM.sedes.show', compact('sede'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sede)
    {

        $sede=Sede::where('idSede',$sede)->first();

        return view('CRM.sedes.edit', compact('sede'));
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
        return 'hola';
        $sede=Sede::where('idSede',$sede)->update($request->all());
//        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('sedes.edit',$sede->idSede)->with('info','Sede actualizada con éxito');
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
