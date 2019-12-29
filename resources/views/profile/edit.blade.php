@extends('layouts.app', ['page' => __('Perfil del Usuario'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card card-user">
                    <div class="card-body">
                        <div class="author">
{{--                                <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>--}}
                            <a>
{{-- <img class="avatar" src="{{ asset('black') }}/img/emilyz.jpg" alt="">--}}
                                <h5 class="title">{{ auth()->user()->name }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h5 class="title">{{ _('Editar Perfil') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        @include('alerts.success')
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Nombre') }}</label>
                            <input type="text" name="name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   placeholder="{{ _('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ _('Email') }}</label>
                            <input type="email" name="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="{{ _('Email address') }}"
                                   value="{{ old('email', auth()->user()->email) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Actualizar Perfil') }}</button>
                    </div>
                </form>
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ _('Password') }}</h5>
                    </div>
                    <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                        <div class="card-body">
                            @csrf
                            @method('put')
                            @include('alerts.success', ['key' => 'password_status'])
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <label>{{ __('Actual Contraseña') }}</label>
                                <input type="password" name="old_password"
                                       class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('Actual Contraseña') }}" value="" required>
                                @include('alerts.feedback', ['field' => 'old_password'])
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label>{{ __('Nueva Contraseña') }}</label>
                                <input type="password" name="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('Nueva Contraseña') }}" value="" required>
                                @include('alerts.feedback', ['field' => 'password'])
                            </div>
                            <div class="form-group">
                                <label>{{ __('Confirmar Nueva Contraseña') }}</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                       placeholder="{{ __('Confirmar Nueva Contraseña') }}" value="" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{ _('Cambiar Contraseña') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
