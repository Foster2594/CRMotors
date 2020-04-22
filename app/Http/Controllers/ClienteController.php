<?php

namespace App\Http\Controllers;
use App\Canton;
use App\Cliente;
use App\Distrito;
use App\Empleado;
use App\Genero;
use App\Http\Requests\ClienteRequest;
use App\Ocupacion;
use App\Provincia;
use App\User;
use App\Vehiculo;
use Illuminate\Http\Request;
use Mockery\Exception;

class Clientecontroller extends Controller
{
    //esta funcion sirve para mostrar la vista principal donde nos muestra todos los clientes introducidos
    public function index()
    {
        $clientes=Cliente::where('idEstadoCliente',1)->paginate();
        $clientesVacios=Cliente::where('idEstadoCliente',1)->where('idEmpleado',null)->where('idEmpleado',0)->paginate();
        return view('CRM.clientes.index', compact('clientes','clientesVacios'));
    }
//busca clientes por cartera
    public function indexCartera()
    {
        $user= auth()->id();
        $clientes=Cliente::where('idEstadoCliente',1)->where('idEmpleado',$user)->paginate();
        $clientesVacios=Cliente::where('idEstadoCliente',1)->whereIn('idEmpleado',[null,0])->paginate();

        return view('CRM.clientes.index', compact('clientes','clientesVacios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //aqui muestra la vista donde se crearan los clientes nuevos
    public function create()
    {
        $genero=Genero::pluck('nombre','idGenero');
        $ocupacion=Ocupacion::pluck('nombre','idOcupacion');
        $provincias=Provincia::get();
        $cantones=[];
        $distritos=[];
        $vehiculos=Vehiculo::pluck('codigo','idVehiculo');

        return view('CRM.clientes.create',compact('cliente','genero','ocupacion','provincias','cantones','distritos','vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //en esta funcion es donde se guarda los clientes para posteriormente mostrarse en la pantalla principal
    public function store(ClienteRequest $request)
    {
        $request->validate([
            'idEmpleado' ,
            'idTipoCliente'  =>'required',
            'cedula'  => 'required|numeric|digits:9',
            'nombre' =>'required',
            'apellido1' =>'required',
            'apellido2' =>'required',
            'idGenero' =>'required',
            'idOcupacion' =>'required',
            'numeroCelular' =>'required|numeric',
            'otroTelefono' =>'required|numeric',
            'correo'=>'required|email',
            'fechaNacimiento'=>'required|date',
            'ingresoSalarial' =>'required|numeric',
            'idProvincia'=>'required',
            'idCanton'=>'required',
            'idDistrito'=>'required',
            'direccionExacta'=>'required',
            'idVehiculoInteres'=>'required',
        ]);
        try{

        $idCliente= Cliente::max('idCliente');
        $idCliente=$idCliente+1;
        //return response()->json($idCliente);
        $request->request->add(['idCliente' => $idCliente,
            'idEstadoCliente'=>1]);
        $cliente= Cliente::create($request->all());
            return redirect()->route('clientes.index')->with('info','Cliente guardado con éxito');

        }catch (Exception $exception){

//            Alert::danger('this is a test message');
            return redirect()->route('clientes.index')->with('alert','Error inesperado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //aqui nos muestra con mas detalles los datos del cliente desde otra vista distinta
    public function show($cliente)
    {
        $cliente=Cliente::where('idCliente',$cliente)->first();
        return view('CRM.clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //esto nos abre una vista en donde podemos editar a algun usuario
    public function edit($cliente, Request $request)
    {

        $genero=Genero::pluck('nombre','idGenero');
        $ocupacion=Ocupacion::pluck('nombre','idOcupacion');
        $provincias=Provincia::pluck('nombre','idProvincia');
        $cantones=Canton::pluck('nombre','idCanton');
        $distritos=Distrito::pluck('nombre','idDistrito');
        $vehiculos=Vehiculo::pluck('modelo','idVehiculo');

        $cliente=Cliente::where('idCliente',$cliente)->first();

        return view('CRM.clientes.edit', compact('cliente','genero','ocupacion','provincias','cantones','distritos','vehiculos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //aqui nos actualiza al usuario
    public function update(ClienteRequest $request, $cliente)
    {
        $request->validate([
            'idEmpleado' ,
            'idTipoCliente'  =>'required',
            'cedula'  => 'required|numeric|digits:9',
            'nombre' =>'required',
            'apellido1' =>'required',
            'apellido2' =>'required',
            'idGenero' =>'required',
            'idOcupacion' =>'required',
            'numeroCelular' =>'required|numeric',
            'otroTelefono' =>'required|numeric',
            'correo'=>'required|email',
            'fechaNacimiento'=>'required|date',
            'ingresoSalarial' =>'required|numeric',
            'idProvincia'=>'required',
            'idCanton'=>'required',
            'idDistrito'=>'required',
            'direccionExacta'=>'required',
            'idVehiculoInteres'=>'required',
        ]);
        //  return $request;
        $request->request->add(['idCliente' => $cliente]);
        $cliente=Cliente::where('idCliente',$cliente)->update($request->except('_token'));

//        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('clientes.show', compact('cliente'))->with('info','cliente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //aqui se borra un usuario
    public function destroy($cliente)
    {
        $cliente=Cliente::where('idCliente',$cliente)->update(['idEstadoCliente'=>0]);

        return back()->with('info', 'Inhabilitado correctamente');
    }

    public function quitarDeCartera($cliente)
    {
        $cliente=Cliente::where('idCliente',$cliente)->update(['idEmpleado'=>0]);

        return back()->with('info', 'Se ha eliminado de su cartera correctamente');
    }
//
    public function asignarCartera()
    {
        $clientesVacios=Cliente::where('idEstadoCliente',1)->whereIn('idEmpleado',[null,0,])->paginate();
        $usuarios=User::pluck('name','id');

        return view('CRM.clientes.CarteraDisponible', compact('clientesVacios','usuarios'));
    }
    //Metodo para asignar cliente a cartera de empleado
    public function asignarCliente($cliente, $empleado)
    {
        return $cliente;
        $clienteAsignado=Cliente::where('idCliente',$request->idCliente)->update(['idEmpleado'=>$request->idEmpleado]);

        return back()->with('info', 'Se ha eliminado de su cartera correctamente');
    }
    public function asignarClienteR(Request $request,$cliente)
    {
        $clienteAsignado=Cliente::where('idCliente',$cliente)->update(['idEmpleado'=>$request->Empleado]);

        return back()->with('info', 'Se ha asignado correctamente');
    }
}
