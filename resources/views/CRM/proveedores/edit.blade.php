@extends('layouts.app')
<!--En esta vista se crean la para editar las sedes-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Proveedores</div>
                <div class="card-body">

                    {!! Form::model($proveedores,['route' => ['proveedores.update',$proveedores->idProveedor]]) !!}
                    @include('CRM.proveedores.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-proveedores').className+=' active';
    </script>
@endsection