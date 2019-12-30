@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Sede'), 'contentClass' => 'show'])
<!--En esta vista se crean la para mostrar una de las sedes-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ver Sede</h4>
                </div>
                <div class="card-body">
                    <p><strong>Nombre: </strong>{{ $sede->nombre }}</p>
                    <p><strong>Telefono: </strong>{{ $sede->telefono }}</p>
                    <p><strong>Correo: </strong>{{ $sede->correo }}</p>
                    <p><strong>Provincia: </strong>{{ $sede->idProvincia }}</p>
                    <p><strong>Canton: </strong>{{ $sede->idCanton }}</p>
                    <p><strong>Distrito: </strong>{{ $sede->idDistrito }}</p>
                    <p><strong>Dirección: </strong>{{ $sede->direccionExacta }}</p>
                    <p><strong>Estado: </strong>{{ $sede->idEstadoSede }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('sedes.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
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
