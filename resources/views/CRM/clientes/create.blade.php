@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Clientes</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'clientes.store']) !!}
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
        document.getElementById('nav-roles').className+=' active';
    </script>
@endsection