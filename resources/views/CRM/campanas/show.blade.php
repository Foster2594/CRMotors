@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Campanas</div>
                <div class="card-body">
                    <p><strong>Nombre: </strong>{{ $campana->nombre }}</p>
                    <p><strong>Descripcion: </strong>{{ $campana->correo }}</p>
                    <p><strong>Fecha Inicio: </strong>{{ $campana->telefono }}</p>
                    <p><strong>Fecha Final: </strong>{{ $campana->telefono }}</p>
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