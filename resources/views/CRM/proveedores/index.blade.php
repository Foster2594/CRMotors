@extends('layouts.app', ['pageSlug' => 'index', 'page' => _('Proveedores'), 'contentClass' => 'index'])
<!--En esta vista se crean la para mostrar todas las proveedores-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Proveedores
                            <a href="{{ route('proveedores.create', $proveedores) }}" class="btn btn-sm btn-primary float-right">
                                Crear
                            </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->cedula }}</td>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->numeroTelefono }}</td>
                                <td>{{ $proveedor->correo }}</td>
                                <td>{{ $proveedor->idEstadoProveedor }}</td>
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
