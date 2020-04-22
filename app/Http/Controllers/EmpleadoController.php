<?php

namespace App\Http\Controllers;

use App\Canton;
use App\Departamento;
use App\Distrito;
use App\Empleado;


use App\estadoEmpleado;
use App\Genero;
use App\Provincia;
use App\Sede;
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
        $provincias=Provincia::get();
        $cantones=[];
        $distritos=[];
        $sedes=Sede::pluck('nombre','idSede');
        $estados=estadoEmpleado::pluck('nombre','idEstadoEmpleado');
        $departamentos=Departamento::pluck('nombre','idDepartamento');
        $generos=Genero::pluck('nombre','idGenero');
        return view('CRM.empleados.create',compact('empleados','provincias','cantones','generos','distritos','sedes','estados','departamentos'));
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
            , 'idCanton'=>'required'
            , 'idDistrito'=>'required'
            , 'direccionExacta'=>'required'
            , 'idSede'=>'required'
            , 'idDepartamento'=>'required'
            , 'idEstadoEmpleado' =>'required',
        ]);





        $idempleado = Empleado::max('idEmpleado');
        $idempleado=$idempleado+1;
        //return response()->json($idempleado);
        $request->request->add(['idEmpleado' => $idempleado]);
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
    public function edit($empleado,Request $request)
    {
        $provincias=Provincia::get();
        $cantones=[];
        $distritos=[];
        $sedes=Sede::pluck('nombre','idSede');
        $estados=estadoEmpleado::pluck('nombre','idEstadoEmpleado');
        $departamentos=Departamento::pluck('nombre','idDepartamento');
        $generos=Genero::pluck('nombre','idGenero');


        $empleado=Empleado::where('idempleado',$empleado)->first();

        return view('CRM.empleados.edit', compact('empleado','estados','departamentos','generos','sedes','provincias','cantones','distritos'));

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
        $request->validate([
            'cedula' =>'required|numeric|digits:9'
            , 'nombre'=>'required'
            , 'apellido1'=>'required'
            , 'apellido2'=>'required'
            , 'telefonoCelular' =>'required|numeric'
            , 'otroTelefono' =>'required|numeric'
            , 'correo'=>'required|email'
            , 'idCanton'=>'required'
            , 'idDistrito'=>'required'
            , 'direccionExacta'=>'required'
            , 'idSede'=>'required'
            , 'idDepartamento'=>'required'
            , 'idEstadoEmpleado' =>'required',
        ]);
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
