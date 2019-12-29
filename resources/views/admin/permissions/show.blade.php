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
                </div>
                <div class="card-footer">
                    <button type="button" onclick="history.go(-1)" class="btn btn-sm btn-success">{{ _('Regresar') }}</button>
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
