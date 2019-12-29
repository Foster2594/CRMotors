@extends('layouts.app', ['pageSlug' => 'edit', 'page' => _('Editar Empleado'), 'contentClass' => 'edit'])
<!--En esta vista se crean la para editar las empleados-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Empleado</div>
                <div class="card-body">
                    {{--{!! Form::model($empleado, ['route' => ['empleados.update',$empleado->idempleado],--}}
                    {{--'method' => 'POST']) !!}--}}
                    {!! Form::model($empleado,['route' => ['empleados.update',$empleado->idEmpleado]]) !!}
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
        document.getElementById('nav-empleados').className+=' active';
    </script>
@endsection
