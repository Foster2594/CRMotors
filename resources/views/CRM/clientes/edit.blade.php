@extends('layouts.app', ['pageSlug' => 'edit', 'page' => _('Editar Cliente'), 'contentClass' => 'edit'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Cliente</h4>
                </div>
                <div class="card-body">
                    {{--{!! Form::model($sede, ['route' => ['sedes.update',$sede->idSede],--}}
                    {{--'method' => 'POST']) !!}--}}
                    {!! Form::model($cliente,['route' => ['clientes.update',$cliente->idCliente]]) !!}
                    @include('CRM.clientes.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-clientes').className+=' active';
    </script>
    @include('CRM.includes.direccion')
@endsection
