@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sedes</div>
                <div class="card-body">
                    <p><strong>Nombre: </strong>{{ $sede->nombre }}</p>
                    <p><strong>Correo: </strong>{{ $sede->correo }}</p>
                    <p><strong>Tel: </strong>{{ $sede->telefono }}</p>
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