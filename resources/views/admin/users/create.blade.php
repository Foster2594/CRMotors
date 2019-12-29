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
                        <form class="form" method="post" action="{{ route('create') }}">
                            @csrf
                            {{-- se llena los datos del nuevo usuario--}}
                            <div class="form-group">
                                {{ Form::label('name','Nombre *') }}
                                {{ Form::text('name',null,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email','Correo *') }}
                                {{ Form::text('email',null,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('password','Contraseña *') }}
                                {{ Form::text('password',null,['class' => 'form-control']) }}
                            </div>
                        {{--para crear el usuario--}}
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Crear') }}</button>
                            <button type="button" onclick="history.go(-1)" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Regresar') }}</button>
                        </div>
                        </form>
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
