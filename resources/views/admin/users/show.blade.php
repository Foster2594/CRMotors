@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Usuario'), 'contentClass' => 'show'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ver Usuario</h4>
                </div>
                <div class="card-body">
                    <p><strong>Nombre: </strong>{{ $user->name }}</p>
                    <p><strong>Correo: </strong>{{ $user->email }}</p>
                    <p><strong>Fecha de Creación: </strong>{{ $user->created_at }}</p>
                    <p><strong>Fecha de Modificación: </strong>{{ $user->updated_at }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
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
