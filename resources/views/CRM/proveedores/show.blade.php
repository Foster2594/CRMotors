@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Proveedor'), 'contentClass' => 'show'])
<!--En esta vista se crean la para mostrar una de las sedes-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Ver Proveedor</h4></div>
                <div class="card-body">
                    <p><strong>Id: </strong>{{ $proveedor->idProveedor }}</p>
                    <p><strong>Cedula: </strong>{{ $proveedor->cedula }}</p>
                    <p><strong>Nombre: </strong>{{ $proveedor->nombre }}</p>
                    <p><strong>Número Telefónico: </strong>{{ $proveedor->numeroTelefono }}</p>
                    <p><strong>Correo: </strong>{{ $proveedor->correo }}</p>
                    <p><strong>Estado: </strong>{{ $proveedor->idEstadoProveedor }}</p>
                </div>
                <div class="card-footer">
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
