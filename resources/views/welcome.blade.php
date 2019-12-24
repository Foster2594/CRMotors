@extends('layouts.app')
<!--En esta vista se mostraran la pagina de inicio-->
@section('content')
    <body style="background-color: black">
    <div  class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ ('CR Motors') }}</h1>

                        <img width="350" src="{{ asset('black') }}/img/logo.jpg" alt="">
                        <form class="form" method="post" action="{{ route('login') }}">
                            @csrf

                            <div class="card card-login card-white">
                                <div class="card-header">
                                    <h1 class="card-title">{{ _('Login') }}</h1>
                                </div>
                                <div class="card-body">
                                    {{-- se le espefica al usuario que se ingresa con correo y contraseña--}}
                                    {{-- se valida el email y la contraseña en la base de datos--}}
                                    {{-- se agregan validaciones para los datos--}}
                                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tim-icons icon-email-85"></i>
                                            </div>
                                        </div>
                                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email') }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tim-icons icon-lock-circle"></i>
                                            </div>
                                        </div>
                                        <input type="password" placeholder="{{ _('Contraseña') }}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                </div>
                                {{-- boton para ingresar al home--}}
                                <div class="card-footer">
                                    <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Ingresar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
