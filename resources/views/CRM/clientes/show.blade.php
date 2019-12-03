@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Clientes</div>
                <div class="card-body">
                    <p><strong>Nombre: </strong>{{ $cliente->nombre }}</p>
                    <p><strong>Correo: </strong>{{ $cliente->correo }}</p>
                    <p><strong>Tel: </strong>{{ $cliente->telefono }}</p>
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