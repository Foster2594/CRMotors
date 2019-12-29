@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Vehículo'), 'contentClass' => 'show'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Ver Vehículo</h4>
                </div>
                <div class="card-body">
                    <p><strong>Proveedor: </strong>{{ $vehiculo->idProveedor }}</p>
                    <p><strong>Tipo Vehiculo: </strong>{{ $vehiculo->idTipoVehiculo }}</p>
                    <p><strong>Codigo: </strong>{{ $vehiculo->codigo }}</p>
                    <p><strong>Marca: </strong>{{ $vehiculo->marca }}</p>
                    <p><strong>Modelo: </strong>{{ $vehiculo->modelo }}</p>
                    <p><strong>Version: </strong>{{ $vehiculo->parametroVersion }}</p>
                    <p><strong>Año: </strong>{{ $vehiculo->annio }}</p>
                    <p><strong>Disponibles: </strong>{{ $vehiculo->cantidadDisponible }}</p>
                    <p><strong>Fecha Ingreso: </strong>{{ $vehiculo->fechaIngreso }}</p>
                    <p><strong>Fecha Salida: </strong>{{ $vehiculo->fechaSalida }}</p>
                    <button type="button" onclick="history.go(-1)" class="btn btn-sm btn-success">{{ _('Regresar') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-roles').className+=' active';
    </script>
@endsection
