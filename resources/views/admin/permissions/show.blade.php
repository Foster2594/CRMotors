@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Permiso'), 'contentClass' => 'show'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ver Permiso</h4>
                </div>
                <div class="card-body">
                    <p><strong>Nombre: </strong>{{ $permission->name }}</p>
                    <p><strong>Descripción: </strong>{{ $permission->description }}</p>
                    <p><strong>Slug: </strong>{{ $permission->slug }}</p>
                    <p><strong>Fecha de Creación: </strong>{{ $permission->created_at }}</p>
                    <p><strong>Fecha de Actualización: </strong>{{ $permission->updated_at }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-permissions').className+=' active';
    </script>
@endsection
