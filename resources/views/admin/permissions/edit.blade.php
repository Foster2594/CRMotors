@extends('layouts.app', ['pageSlug' => 'edit', 'page' => _('Editar Permiso'), 'contentClass' => 'edit'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Editar Permiso</h4></div>
                <div class="card-body">
                    {!! Form::model($permission, ['route' => ['permissions.update',$permission->id],
                    'method' => 'PUT']) !!}
                        @include('admin.permissions.partials.form')
                    {!! Form::close() !!}
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
