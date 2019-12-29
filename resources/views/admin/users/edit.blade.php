@extends('layouts.app', ['pageSlug' => 'edit', 'page' => _('Editar Usuario'), 'contentClass' => 'edit'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Usuario</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($user, ['route' => ['users.update',$user->id],
                    'method' => 'PUT']) !!}
                        @include('admin.users.partials.form')
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
