<!--En esta vista se crean la para generar las sedes-->
@extends('layouts.app', ['pageSlug' => 'create', 'page' => _('Crear Sede'), 'contentClass' => 'create'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Crear Sede</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'sedes.store']) !!}
                        @include('CRM.sedes.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-sedes').className+=' active';
    </script>
@endsection
