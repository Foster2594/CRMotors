<?php

namespace App\Http\Controllers;

use App\Canton;
use App\Distrito;
use App\Empleado;


use App\Provincia;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados=Empleado::paginate();
        return view('CRM.empleados.index', compact('empleados'));
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
        return view('CRM.empleados.create',compact('empleados','provincias','cantones','distritos'));
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
           'cedula' =>'required|numeric|digits:9'
            , 'nombre'=>'required'
            , 'apellido1'=>'required'
            , 'apellido2'=>'required'

            , 'telefonoCelular' =>'required|numeric'
            , 'otroTelefono' =>'required|numeric'
            , 'correo'=>'required|email'
            , 'idProvincia'=>'required'
            , 'idCanton'=>'required'
            , 'idDistrito'=>'required'
            , 'direccionExacta'=>'required'
            , 'idSede'=>'required'
            , 'idDepartamento'=>'required'
            , 'idEstadoEmpleado' =>'required',



        ]);





        $idempleado = Empleado::max('idempleado');
        $idempleado=$idempleado+1;
        //return response()->json($idempleado);
        $request->request->add(['idempleado' => $idempleado]);
        $empleado = Empleado::create($request->all());

        return redirect()->route('empleados.index')->with('info','empleado guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($empleado)
    {

        $empleado=Empleado::where('idempleado',$empleado)->first();
        return view('CRM.empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($empleado)
    {
        $provincias=Provincia::pluck('nombre','idProvincia');
        $cantones=Canton::pluck('nombre','idCanton');
        $distritos=Distrito::pluck('nombre','idDistrito');
        $empleado=Empleado::where('idempleado',$empleado)->first();

        return view('CRM.empleados.edit', compact('empleado','provincias','cantones','distritos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $empleado)
    {
        //  return $request;
        $request->request->add(['idempleado' => $empleado]);

        $empleado=Empleado::where('idempleado',$empleado)->update($request->except('_token'));

//        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('empleados.show', compact('empleado'))->with('info','empleado actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($empleado)
    {
        $empleado=Empleado::where('idempleado',$empleado)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
