@extends('layouts.app', ['class' => 'login-page', 'page' => _('Cambio de Contraseña'), 'contentClass' => 'login-page'])
{{--extiende de layouts --}}
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <form class="form" method="post" action="{{ route('password.email') }}">
                @csrf
                <div class="card card-login card-white">
                    <div class="card-header">
                        <img src="{{ asset('black') }}/img/MG.png" alt="Morris Garages" title="Morris Garages">
                    </div>
                    <div class="card-body">
                        @include('alerts.success')
                        {{-- se le espefica al usuario que se ingresa con correo y contraseña--}}
                        <p class="text-dark mb-2">Digita tu correo corporativo <strong>tuusuario@royalmotors.cr</strong> para enviarte las instrucciones para el restablecimiento de la contraseña</p>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            {{--aqui pongo el email a donde yo quiero que manden mi contraseña para restablecerla y se verifica con la base --}}
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                    </div>
                    {{--enviar correo para resetearr mi contraseña --}}
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Enviar Correo') }}</button>
                        <button type="button" onclick="history.go(-1)" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Regresar') }}</button>
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
                        <li>la gestión comercial,
                        <li>el marketing
                        <li>el servicio postventa o de atención al cliente.
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
