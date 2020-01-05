@extends('layouts.app', ['pageSlug' => 'edit', 'page' => _('Editar Campaña'), 'contentClass' => 'edit'])
<!--En esta vista se crean la para editar las campanas-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Campaña</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($campana, ['route' => ['campanas.update',$campana->idCampana]]) !!}
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
        document.getElementById('nav-campanas').className+=' active';
    </script>
@endsection
