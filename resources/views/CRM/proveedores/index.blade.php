@extends('layouts.app')
<!--En esta vista se crean la para mostrar todas las proveedores-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>proveedores
                            <a href="{{ route('proveedores.create', $proveedores) }}" class="btn btn-sm btn-primary float-right">
                                Crear
                            </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>ID Provincia</th>
                                <th>ID Canton</th>
                                <th>ID Distrito</th>
                                <th>Direccion</th>
                                <th>ID Estado/proveedor</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->idProveedor }}</td>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>{{ $proveedor->correo }}</td>
                                <td>{{ $proveedor->idProvincia }}</td>
                                <td>{{ $proveedor->idCanton }}</td>
                                <td>{{ $proveedor->idDistrito }}</td>
                                <td>{{ $proveedor->direccionExacta }}</td>
                                <td>{{ $proveedor->idEstadoproveedor }}</td>

                                <td width="10px">
                                    <a href="{{ route('proveedores.show', $proveedor->idProveedor) }}" class="btn btn-sm btn-success">
                                        Ver
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('proveedores.edit', $proveedor->idProveedor) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>

                                </td>
                                <td width="10px">

                                    {!! Form::open(['route' => ['proveedores.destroy', $proveedor->idProveedor],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $proveedores->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-proveedores').className+=' active';
    </script>
@endsection