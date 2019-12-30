<!--En esta vista se crean la para generar las sedes-->
@extends('layouts.app', ['pageSlug' => 'create', 'page' => _('Crear Usuario'), 'contentClass' => 'create'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crear Usuario</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'users.store']) !!}
                        @include('admin.users.partials.createForm')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-users').className+=' active';
    </script>
@endsection
