@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Campaña'), 'contentClass' => 'show'])
<!--En esta vista se crean la para mostrar una de las campanhas-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ver Campaña</h4>
                </div>
                <div class="card-body">
                    <p><strong>Id: </strong>{{ $campana->idCampana }}</p>
                    <p><strong>Nombre: </strong>{{ $campana->nombre }}</p>
                    <p><strong>Descripcion: </strong>{{ $campana->descripcion }}</p>
                    <p><strong>Fecha Inicio: </strong>{{ $campana->fechaInicio }}</p>
                    <p><strong>Fecha Final: </strong>{{ $campana->fechaFinal }}</p>
                    <p><strong>Descuento Mínimo: </strong>{{ $campana->descuentoMinimo }}</p>
                    <p><strong>Descuento Máximo: </strong>{{ $campana->descuentoMaximo }}</p>
                    <p><strong>Tipo Campaña: </strong>{{ $campana->idTipoCampana }}</p>
                    <p><strong>Sede: </strong>{{ $campana->idSede }}</p>
                    <p><strong>Provincia: </strong>{{ $campana->idProvincia }}</p>
                    <p><strong>Canton: </strong>{{ $campana->idCanton }}</p>
                    <p><strong>Creado por: </strong>{{ $campana->idEmpleadoCreador }}</p>
                    <p><strong>Aprobado por: </strong>{{ $campana->idEmpleadoAprobador }}</p>
                    <p><strong>Estado: </strong>{{ $campana->idEstadoCampana }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('campanas.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-campanas').className+=' active';
    </script>
@endsection
