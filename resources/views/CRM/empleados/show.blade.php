@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Empleado'), 'contentClass' => 'show'])
<!--En esta vista se crean la para mostrar una de las empleados-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ver Empleado</h4>
                </div>
                <div class="card-body">
                    <p><strong>Id: </strong>{{ $empleado->idEmpleado }}</p>
                    <p><strong>Cédula: </strong>{{ $empleado->cedula }}</p>
                    <p><strong>Nombre: </strong>{{ $empleado->nombre }}</p>
                    <p><strong>Primer Apellido: </strong>{{ $empleado->apellido1 }}</p>
                    <p><strong>Segundo Apellido: </strong>{{ $empleado->apellido2 }}</p>
                    <p><strong>Género: </strong>{{ $empleado->idGenero }}</p>
                    <p><strong>Teléfono Celular: </strong>{{ $empleado->telefonoCelular }}</p>
                    <p><strong>Otro Teléfono: </strong>{{ $empleado->otroTelefono }}</p>
                    <p><strong>Correo: </strong>{{ $empleado->correo }}</p>
                    <p><strong>Provincia: </strong>{{ $empleado->idProvincia }}</p>
                    <p><strong>Cantón: </strong>{{ $empleado->idCanton }}</p>
                    <p><strong>Distrito: </strong>{{ $empleado->idDistrito }}</p>
                    <p><strong>Dirección: </strong>{{ $empleado->direccionExacta }}</p>
                    <p><strong>Sede: </strong>{{ $empleado->idSede }}</p>
                    <p><strong>Departamento: </strong>{{ $empleado->idDepartamento }}</p>
                    <p><strong>Estado: </strong>{{ $empleado->idEstadoEmpleado }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('empleados.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
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
