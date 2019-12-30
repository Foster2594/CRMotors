@extends('layouts.app', ['pageSlug' => 'edit', 'page' => _('Editar Sede'), 'contentClass' => 'edit'])
<!--En esta vista se crean la para editar las sedes-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Sede</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($sede,['route' => ['sedes.update',$sede->idSede]]) !!}
                    @include('CRM.sedes.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-sedes').className+=' active';
    </script>
@endsection
