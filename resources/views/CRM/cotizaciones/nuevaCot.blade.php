@extends('layouts.app', ['pageSlug' => 'nuevaCot', 'page' => _('Nueva Cotización'), 'contentClass' => 'nuevaCot'])
<!--En esta vista se crean la para generar las cotizaciones con detalle-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="panel-content">
                        <h4 class="pull-left">Nueva Cotización</h4>
                        <h4 class="pull-right">Numero de Cotización: COT#-00{{$idCotizacion}}</h4>
                    </div>
                    {!! Form::open(['route' => 'cotizaciones.store']) !!}
                </div>
                <div class="card-body">
                        @include('CRM.cotizaciones.partials.formNueva')
                    {!! Form::close() !!}
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
