@extends('layouts.app', ['class' => 'login-page', 'page' => _('Inicio de Sesión'), 'contentClass' => 'login-page'])
{{-- extiende de layouts--}}
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <form class="form" method="post" action="{{ route('login') }}">
                @csrf
                <div class="card card-login card-white">
                    <div class="card-header">
                        <img src="{{ asset('black') }}/img/MG.png" alt="Morris Garages" title="Morris Garages">
                    </div>
                    <div class="card-body">
                        {{-- se le espefica al usuario que se ingresa con correo y contraseña--}}
                        <p class="text-dark mb-2">Ingresa con tu correo corporativo <strong>tuusuario@royalmotors.cr</strong> y tu contraseña <strong>secreta</strong></p>
                        {{-- se valida el email y la contraseña en la base de datos--}}
                        {{-- se agregan validaciones para los datos--}}
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo') }}">
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
                        <button type="button" onclick="history.go(-1)" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Regresar') }}</button>
                        {{--<div class="pull-left">
                            --}}{{-- boton para registrarme como nuevo usuario--}}{{--
                            <h6>
                                <a href="{{ route('register') }}" class="link footer-link">{{ _('Registrarme') }}</a>
                            </h6>
                        </div>--}}
                        <div class="pull-right">
                            <h6>
                                {{--aqui es por si olvide la contraseña para restaurarla --}}
                                <a href="{{ route('password.request') }}" class="link footer-link">{{ _('Olvidaste tu contraseña?') }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5 ml-auto">
            <div class="info-area info-horizontal mt-5">
                <div class="description">
                    <h3 class="info-title">¿Qué es un CRM?</h3>
                    <p class="description">
                        Un CRM es una solución de gestión de las relaciones
                        con clientes, orientada normalmente a gestionar tres
                        áreas básicas:
                    <ul>
                        <li>La gestión comercial.
                        <li>El marketing.
                        <li>El servicio postventa o de atención al cliente.
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
