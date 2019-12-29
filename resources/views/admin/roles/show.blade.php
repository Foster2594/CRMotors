@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Rol'), 'contentClass' => 'show'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Ver Rol
                    </h4>
                </div>
                <div class="card-body">
                    <p><strong>Nombre: </strong>{{ $role->name }}</p>
                    <p><strong>Slug: </strong>{{ $role->slug }}</p>
                    <p><strong>Descripción: </strong>{{ $role->description }}</p>
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
        document.getElementById('nav-roles').className+=' active';
    </script>
@endsection
