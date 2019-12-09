<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Empleado;
use App\Provincia;
use App\User;
use Illuminate\Http\Request;

class Clientecontroller extends Controller
{
    //esta funcion sirve para mostrar la vista principal donde nos muestra todos los clientes introducidos
    public function index()
    {
        $clientes=Cliente::paginate();
        $clientesVacios=Cliente::where('idEmpleado',null)->where('idEmpleado',0)->paginate();
        return view('CRM.clientes.index', compact('clientes','clientesVacios'));
    }
//busca clientes por cartera
    public function indexCartera()
    {
        $user= auth()->id();
        $clientes=Cliente::where('idEmpleado',$user)->paginate();
        $clientesVacios=Cliente::whereIn('idEmpleado',[null,0])->paginate();

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
        $provincias=Provincia::pluck('nombre','idProvincia');
        return view('CRM.clientes.create',compact('clientes','provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //en esta funcion es donde se guarda los clientes para posteriormente mostrarse en la pantalla principal
    public function store(Request $request)
    {
        $idCliente= Cliente::max('idCliente');
        $idCliente=$idCliente+1;
        //return response()->json($idCliente);
        $request->request->add(['idCliente' => $idCliente]);
        $cliente= Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('info','Sede guardada con éxito');
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
    public function edit($cliente)
    {

        $cliente=Cliente::where('idCliente',$cliente)->first();

        return view('CRM.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //aqui nos actualiza al usuario
    public function update(Request $request, $cliente)
    {
        //  return $request;
        $request->request->add(['idCliente' => $cliente]);

        $cliente=Cliente::where('idCliente',$cliente)->update($request->except('_token'));

//        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('clientes.show', compact('cliente'))->with('info','Sede actualizada con éxito');
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
        $cliente=Cliente::where('idCliente',$cliente)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }

    public function quitarDeCartera($cliente)
    {
        $cliente=Cliente::where('idCliente',$cliente)->update(['idEmpleado'=>0]);

        return back()->with('info', 'Se ha eliminado de su cartera correctamente');
    }
//
    public function asignarCartera()
    {
        $clientesVacios=Cliente::whereIn('idEmpleado',[null,0,])->paginate();
        $usuarios=User::pluck('name','id');

        return view('CRM.clientes.CarteraDisponible', compact('clientesVacios','usuarios'));
    }
    //Metodo para asignar cliente a cartera de empleado
    public function asignarCliente(Request $request)
    {

        $clienteAsignado=Cliente::where('idCliente',$request->idCliente)->update(['idEmpleado'=>$request->idEmpleado]);

        return back()->with('info', 'Se ha eliminado de su cartera correctamente');
    }
}
