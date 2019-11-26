<?php

namespace App\Http\Controllers;
use App\Clientes;
use Illuminate\Http\Request;

class Clientecontroller extends Controller
{
    public function index()
    {
        $clientes=Clientes::paginate();

        return view('CRM.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('CRM.clientes.create',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    public function destroy($cliente)
    {
        $cliente=Cliente::where('idCliente',$cliente)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
