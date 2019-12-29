<!--En esta vista se crean la para generar los vehiculos-->
@extends('layouts.app', ['pageSlug' => 'create', 'page' => _('Crear Vehículo'), 'contentClass' => 'create'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Crear Vehículo</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'vehiculos.store']) !!}
                        @include('CRM.vehiculos.partials.form')
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
