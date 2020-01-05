@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Vehículo'), 'contentClass' => 'show'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ver Vehículo</h4>
                </div>
                <div class="card-body">
                    <p><strong>Id: </strong>{{ $vehiculo->idVehiculo }}</p>
                    <p><strong>Proveedor: </strong>{{ $vehiculo->idProveedor }}</p>
                    <p><strong>Tipo: </strong>{{ $vehiculo->idTipoVehiculo }}</p>
                    <p><strong>Código: </strong>{{ $vehiculo->codigo }}</p>
                    <p><strong>Marca: </strong>{{ $vehiculo->marca }}</p>
                    <p><strong>Modelo: </strong>{{ $vehiculo->modelo }}</p>
                    <p><strong>Versión: </strong>{{ $vehiculo->parametroVersion }}</p>
                    <p><strong>Año: </strong>{{ $vehiculo->annio }}</p>
                    <p><strong>Disponibles: </strong>{{ $vehiculo->cantidadDisponible }}</p>
                    <p><strong>Fecha de Ingreso: </strong>{{ $vehiculo->fechaIngreso }}</p>
                    <p><strong>Fecha de Salida: </strong>{{ $vehiculo->fechaSalida }}</p>
                    <p><strong>Precio: </strong>{{ $vehiculo->precio }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('vehiculos.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-vehiculos').className+=' active';
    </script>
@endsection
