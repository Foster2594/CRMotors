@extends('layouts.app', ['pageSlug' => 'create', 'page' => _('Crear Campaña'), 'contentClass' => 'create'])
<!--En esta vista se crean la para crear las campañas-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Campañas</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'campanas.store']) !!}
                        @include('CRM.campanas.partials.form')
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
