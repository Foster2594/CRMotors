@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Permisos</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'permissions.store']) !!}
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