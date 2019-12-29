@extends('layouts.app', ['pageSlug' => 'index', 'page' => _('Vehículos'), 'contentClass' => 'index'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Vehiculos
                            <a href="{{ route('vehiculos.create', $vehiculos) }}" class="btn btn-sm btn-primary float-right">
                                Crear
                            </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Version</th>
                                <th>Año</th>
                                <th>Disponibles</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Salida</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehiculos as $vehiculo)
                            <tr>
                                <td>{{ $vehiculo->idVehiculo }}</td>
                                <td>{{ $vehiculo->marca }}</td>
                                <td>{{ $vehiculo->modelo }}</td>
                                <td>{{ $vehiculo->parametroVersion }}</td>
                                <td>{{ $vehiculo->annio }}</td>
                                <td>{{ $vehiculo->cantidadDisponible }}</td>
                                <td>{{ $vehiculo->fechaIngreso }}</td>
                                <td>{{ $vehiculo->fechaSalida }}</td>
                                <td width="10px">
                                    <a href="{{ route('vehiculos.show', $vehiculo->idVehiculo) }}" class="btn btn-sm btn-success">
                                        Ver
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('vehiculos.edit', $vehiculo->idVehiculo) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['vehiculos.destroy', $vehiculo->idVehiculo],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $vehiculos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-sedes').className+=' active';
    </script>
@endsection
