@extends('layouts.app')
<!--En esta vista se crean la para mostrar una de las sedes-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Proveedor</div>
                <div class="card-body">
                    <p><strong>Nombre: </strong>{{ $proveedor->nombre }}</p>
                    <p><strong>Correo: </strong>{{ $proveedor->correo }}</p>
                    <p><strong>Tel: </strong>{{ $proveedor->numeroTelefono }}</p>
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