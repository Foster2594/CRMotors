@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Vehículo
                    @can('vehiculo.create')
                    <a href="{{ route('vehiculo.create') }}" class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                        @endcan</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>ID Proveedor</th>
                                <th>ID Tipo de Vehiculo</th>
                                <th>Codigo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Parametro Version</th>
                                <th>Año</th>
                                <th>Cantidad</th>
                                <th>Fecha De Ingreso</th>
                                <th>Fecha de Salida</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehiculo as $vehiculo)
                            <tr>
                                <td>{{ $vehiculo->idVehiculo }}</td>
                                <td>{{ $vehiculo->idProveedor }}</td>
                                <td>{{ $vehiculo->idTipoVehiculo }}</td>
                                <td>{{ $vehiculo->codigo }}</td>
                                <td>{{ $vehiculo->marca }}</td>
                                <td>{{ $vehiculo->modelo}}</td>
                                <td>{{ $vehiculo->annio }}</td>
                                <td>{{ $vehiculo->cantidadDisponible }}</td>
                                <td>{{ $vehiculo->fechaIngreso }}</td>
                                <td>{{ $vehiculo->fechaSalida }}</td>
                                

                                <td width="10px">
                                    @can('vehiculo.show')

                                     <a href="{{ route('vehiculo.show', $vehiculo->fechaSalida) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('vehiculo.edit')
                                    <a href="{{ route('vehiculo.edit', $vehiculo->id) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('vehiculo.destroy')
                                    {!! Form::open(['route' => ['vehiculo.destroy', $vehiculo->id],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $vehiculo->links() }}
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