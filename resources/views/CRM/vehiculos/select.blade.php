@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Vehiculos


                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Proveedor</th>
                                <th>Tipo Vehiculo</th>
                                <th>Codigo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Version</th>
                                <th>Año</th>
                                <th>Disponibles</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Salida</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehiculos as $vehiculo)
                            <tr>
                                <td>{{ $vehiculo->idVehiculo }}</td>
                                <td>{{ $vehiculo->idProveedor }}</td>
                                <td>{{ $vehiculo->idTipoVehiculo }}</td>
                                <td>{{ $vehiculo->codigo }}</td>
                                <td>{{ $vehiculo->marca }}</td>
                                <td>{{ $vehiculo->modelo }}</td>
                                <td>{{ $vehiculo->parametroVersion }}</td>
                                <td>{{ $vehiculo->annio }}</td>
                                <td>{{ $vehiculo->cantidadDisponible }}</td>
                                <td>{{ $vehiculo->fechaIngreso }}</td>
                                <td>{{ $vehiculo->fechaSalida }}</td>

                                <td width="10px">

                                    <a href="{{ route('cotizaciones.nueva', $vehiculo) }}"
                                       class="btn btn-sm btn-primary float-right">
                                        Seleccion
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

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