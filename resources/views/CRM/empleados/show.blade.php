@extends('layouts.app')
<!--En esta vista se crean la para mostrar una de las empleados-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">empleados</div>
                <div class="card-body">
                    <p><strong>Nombre: </strong>{{ $empleado->nombre }}</p>
                    <p><strong>Correo: </strong>{{ $empleado->correo }}</p>
                    <p><strong>Tel: </strong>{{ $empleado->telefono }}</p>
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