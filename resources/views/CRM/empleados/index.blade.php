@extends('layouts.app', ['pageSlug' => 'index', 'page' => _('Empleados'), 'contentClass' => 'index'])
<!--En esta vista se crean la para mostrar todas las empleados-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Empleados
                            <a href="{{ route('empleados.create', $empleados) }}" class="btn btn-sm btn-primary float-right">
                                Crear
                            </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">Id</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Telefono Celular</th>
                                <th>Correo</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->idEmpleado }}</td>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->apellido1 }}</td>
                                <td>{{ $empleado->apellido2 }}</td>
                                <td>{{ $empleado->telefonoCelular }}</td>
                                <td>{{ $empleado->correo }}</td>
                                <td width="10px">
                                    <a href="{{ route('empleados.show', $empleado->idEmpleado) }}" class="btn btn-sm btn-success">
                                        Ver
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('empleados.edit', $empleado->idEmpleado) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['empleados.destroy', $empleado->idEmpleado],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $empleados->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-empleados').className+=' active';
    </script>
@endsection
