@extends('layouts.app')
<!--En esta vista se crean la para generar las cotizaciones con detalle-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    {!! Form::open(['route' => 'cotizaciones.store']) !!}

                    <h1><label class="label-left ">Cotizaciones</label></h1>
                    <h1><label class="label float-right simple-text" >Numero de Cotización: COT#-00{{$idCotizacion}}</label></h1>
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
