@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Cliente'), 'contentClass' => 'show'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ver Cliente</h4>
                </div>
                <div class="card-body">
                    <p><strong>Cedula: </strong>{{ $cliente->cedula }}</p>
                    <p><strong>Nombre: </strong>{{ $cliente->nombre }}</p>
                    <p><strong>Primer Apellido: </strong>{{ $cliente->apellido1 }}</p>
                    <p><strong>Segundo Apellido: </strong>{{ $cliente->apellido2 }}</p>
                    <p><strong>Genero: </strong>{{ $cliente->idGenero }}</p>
                    <p><strong>Ocupación: </strong>{{ $cliente->idOcupacion }}</p>
                    <p><strong>Celular: </strong>{{ $cliente->numeroCelular }}</p>
                    <p><strong>Otro Telefono: </strong>{{ $cliente->otroTelefono }}</p>
                    <p><strong>Correo: </strong>{{ $cliente->correo }}</p>
                    <p><strong>Fecha Nacimiento: </strong>{{ $cliente->fechaNacimiento }}</p>
                    <p><strong>Ingreso Salarial: </strong>{{ $cliente->ingresoSalarial }}</p>
                    <p><strong>Provincia: </strong>{{ $cliente->idProvincia }}</p>
                    <p><strong>Cantón: </strong>{{ $cliente->idCanton }}</p>
                    <p><strong>Distrito: </strong>{{ $cliente->idDistrito }}</p>
                    <p><strong>Dirección: </strong>{{ $cliente->direccionExacta }}</p>
                    <p><strong>Vehiculo Interes: </strong>{{ $cliente->idVehiculoInteres }}</p>
                    <p><strong>Estado: </strong>{{ $cliente->idEstadoCliente }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('clientes.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-clientes').className+=' active';
    </script>
@endsection
