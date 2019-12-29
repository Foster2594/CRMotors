@extends('layouts.app',['class' => 'welcome-page', 'page' => _('Inicio'), 'contentClass' => 'welcome-page'])
<!--En esta vista se mostraran la pagina de inicio-->
@section('content')
    <body>
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ ('RM Client') }}</h1>
                        <img src="{{ asset('black') }}/img/logo.png" alt="Morris Garages" title="Morris Garages">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
