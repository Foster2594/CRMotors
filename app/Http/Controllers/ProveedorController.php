<?php

namespace App\Http\Controllers;

use App\estadoProveedor;
use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores=Proveedor::paginate();
        return view('CRM.proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=estadoProveedor::pluck('nombre','idEstadoProveedor');
        return view('CRM.proveedores.create',compact('proveedores','estados'));
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
            'cedula' =>'required|numeric|digits:9|unique:Proveedor',
            'nombre' =>'required',
            'numeroTelefono' =>'required|unique:Proveedor|digits:8',
            'correo' =>'required|email|unique:Proveedor',
            'idEstadoProveedor' =>'required',
    ]);
        $idproveedor = Proveedor::max('idProveedor');
        $idproveedor=$idproveedor+1;
        //return response()->json($idProveedor);
        $request->request->add(['idProveedor' => $idproveedor]);
        $proveedor = Proveedor::create($request->all());
        return redirect()->route('proveedores.index')->with('info','proveedores guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($proveedor)
    {
        $proveedor=Proveedor::where('idProveedor',$proveedor)->first();
        return view('CRM.proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($proveedor)
    {
        $proveedor=Proveedor::where('idProveedor',$proveedor)->first();
        return view('CRM.proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $proveedor)
    {
        //  return $request;
        $request->request->add(['idProveedor' => $proveedor]);
        $proveedor=Proveedor::where('idProveedor',$proveedor)->update($request->except('_token'));
//        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('proveedores.show', compact('proveedor'))->with('info','proveedor actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($proveedor)
    {
        $proveedor=Proveedor::where('idProveedor',$proveedor)->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
