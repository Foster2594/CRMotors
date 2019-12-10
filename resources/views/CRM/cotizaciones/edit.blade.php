@extends('layouts.app')
<!--En esta vista se crean la para editar las cotizaciones-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cotizaciones</div>
                <div class="card-body">
                    {!! Form::model($cotizacion, ['route' => ['cotizaciones.update',$cotizacion->idEncabezadoCotizacion]]) !!}
                        @include('CRM.cotizaciones.partials.form')
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