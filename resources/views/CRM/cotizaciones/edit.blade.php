@extends('layouts.app', ['pageSlug' => 'edit', 'page' => _('Editar Cotización'), 'contentClass' => 'edit'])
<!--En esta vista se crean la para editar las cotizaciones-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Cotización</h4>
                    <h4>COT-000{{ $cotizacion->idEncabezadoCotizacion }}</h4>
                </div>
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
        document.getElementById('nav-cotizaciones').className+=' active';
    </script>
@endsection
