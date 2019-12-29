@extends('layouts.app', ['pageSlug' => 'edit', 'page' => _('Editar Rol'), 'contentClass' => 'edit'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Editar Rol
                    </h4>
                </div>
                <div class="card-body">
                    {!! Form::model($role, ['route' => ['roles.update',$role->id],
                    'method' => 'PUT']) !!}
                        @include('admin.roles.partials.form')
                    {!! Form::close() !!}
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
