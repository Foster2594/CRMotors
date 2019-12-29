@extends('layouts.app', ['class' => 'login-page', 'page' => _('Cambio de Contraseña'), 'contentClass' => 'login-page'])
{{--extiende de layouts --}}
@section('content')
    <div class="col-lg-5 col-md-7 ml-auto mr-auto">
        {{--ruta para actualizar la contraseña --}}
        <form class="form" method="post" action="{{ route('password.update') }}">
            @csrf
            <div class="card card-login card-white">
                <div class="card-header">
                    <img src="{{ asset('black') }}/img/MG.png" alt="Morris Garages" title="Morris Garages">
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <input type="hidden" name="token" value="{{ $token }}">
                    {{--agregar el email para verificar--}}
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
                        {{--Aqui ponemos la contraseña nueva --}}
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ _('Contraseña') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ _('Confirmar Contraseña') }}">
                        </div>
                </div>
                <div class="card-footer">
                    {{--boton para actualizar contraseña --}}
                    <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Restablecer Contraseña') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
