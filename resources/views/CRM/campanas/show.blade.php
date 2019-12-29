@extends('layouts.app')
<!--En esta vista se crean la para mostrar una de las campanhas-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Campaña</h4>
                </div>
                <div class="card-body">
                    <p><strong>Id: </strong>{{ $campana->idCampana }}</p>
                    <p><strong>Nombre: </strong>{{ $campana->nombre }}</p>
                    <p><strong>Descripcion: </strong>{{ $campana->descripcion }}</p>
                    <p><strong>Fecha Inicio: </strong>{{ $campana->fechaInicio }}</p>
                    <p><strong>Fecha Final: </strong>{{ $campana->fechaFinal }}</p>
                    <p><strong>Descuento Mínimo: </strong>{{ $campana->descuentoMinimo }}</p>
                    <p><strong>Descuento Máximo: </strong>{{ $campana->descuentoMaximo }}</p>
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
