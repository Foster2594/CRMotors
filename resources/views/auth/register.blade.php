@extends('layouts.app', ['class' => 'register-page', 'page' => _('Registro'), 'contentClass' => 'register-page'])
{{-- extiende de layouts--}}
@section('content')
    <div class="row">
        <div class="col-md-5 ml-auto">
            <div class="info-area info-horizontal mt-5">
                <div class="description">
                    <h3 class="info-title">¿Qué es un CRM?</h3>
                    <p class="description">
                        Un CRM es una solución de gestión de las relaciones
                        con clientes, orientada normalmente a gestionar tres
                        áreas básicas:
                    <ul>
                        <li>la gestión comercial,
                        <li>el marketing
                        <li>el servicio postventa o de atención al cliente.
                    </ul>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-white">
                <div class="card-header">
                    <img class="card-img" src="{{ asset('black') }}/img/MG.png" alt="Card image">
                </div>
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf
                    {{-- aqui pondremos el formulario para llenar el registro del usuario--}}
                    {{-- agregamos validaciones--}}
                    <div class="card-body">
                        {{-- se le espefica al usuario que ingrese todos sus datos--}}
                        <p class="text-dark mb-2">Ingrese sus datos completos</p>
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   placeholder="{{ _('Nombre Completo') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="{{ _('Correo') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   placeholder="{{ _('Contraseña') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="{{ _('Confirmar Contraseña') }}">
                        </div>
                    </div>
                    {{--para guardar el registro--}}
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Registrar') }}</button>
                        <button type="button" onclick="history.go(-1)" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Regresar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
