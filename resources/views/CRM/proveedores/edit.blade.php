<!--En esta vista se crean la para editar los proveedores-->
@extends('layouts.app', ['pageSlug' => 'create', 'page' => _('Editar Proveedor'), 'contentClass' => 'create'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Proveedor</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($proveedor,['route' => ['proveedores.update',$proveedor->idProveedor]]) !!}
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
