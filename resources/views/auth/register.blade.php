@extends('layouts.app', ['class' => 'register-page', 'page' => _('Registro'), 'contentClass' => 'register-page'])
{{-- extiende de layouts--}}
@section('content')
    <div class="row">
        <div class="col-md-5 ml-auto">
            <div class="info-area info-horizontal mt-5">
                <div class="icon icon-warning">
                    <i class="tim-icons icon-tag"></i>
                </div>
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
        <div class="col-md-7 mr-auto">
            <div class="card card-register card-white">
                <div class="card-header">
                    <img class="card-img" src="{{ asset('black') }}/img/card-primary.png" alt="Card image">
                    <h4 class="card-title">{{ _(' Registro') }}</h4>
                </div>
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf
                    {{-- aqui pondremos el formulario para llenar el registro del usuario--}}
                    {{-- agregamos validaciones--}}
                    <div class="card-body">
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
                                   placeholder="{{ _('Email') }}">
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
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ _('Guardar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
