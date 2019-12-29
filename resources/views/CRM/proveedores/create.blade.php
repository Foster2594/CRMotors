<!--En esta vista se crean la para generar las proveedores-->
@extends('layouts.app', ['pageSlug' => 'create', 'page' => _('Crear Proveedor'), 'contentClass' => 'create'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Crear Proveedor</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'proveedores.store']) !!}
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
        document.getElementById('nav-roles').className+=' active';
    </script>
@endsection
