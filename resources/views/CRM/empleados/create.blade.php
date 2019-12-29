<!--En esta vista se crean la para generar las empleados-->
@extends('layouts.app', ['pageSlug' => 'create', 'page' => _('Crear Empleado'), 'contentClass' => 'create'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Crear Empleado
                    </h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'empleados.store']) !!}
                        @include('CRM.empleados.partials.form')
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
