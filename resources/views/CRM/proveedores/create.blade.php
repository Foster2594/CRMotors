<!--En esta vista se crean la para generar las proveedores-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Proveedores</div>
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