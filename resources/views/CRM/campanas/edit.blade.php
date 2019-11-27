@extends('layouts.app')
<!--En esta vista se crean la para editar las campanas-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Campana</div>
                <div class="card-body">
                    {!! Form::model($campana, ['route' => ['campanas.update',$campana->idCampana],
                    'method' => 'PUT']) !!}
                        @include('CRM.campanas.partials.form')
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