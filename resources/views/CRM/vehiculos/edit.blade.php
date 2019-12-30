@extends('layouts.app', ['pageSlug' => 'create', 'page' => _('Editar Vehículo'), 'contentClass' => 'create'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Vehículo</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($vehiculo, ['route' => ['vehiculos.update',$vehiculo->idVehiculo]]) !!}
                        @include('CRM.vehiculos.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-vehiculos').className+=' active';
    </script>
@endsection
