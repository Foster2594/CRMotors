@extends('layouts.app', ['class' => 'bg-default'])
{{-- extiende de layouts--}}
@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Verificando su correo electrónico') }}</small>
                        </div>
                        <div>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{-- alerta para el usuario de que se ha mandado una verificacion al email del usuario--}}
                                    {{ __('Se ha enviado la ruta de verificación a su correo electrónico.') }}
                                </div>
                            @endif
                            {{ __('Antes de proceder, por favor verificar su correo electrónico para enviar la ruta de verificación.') }}
                            @if (Route::has('verification.resend'))
                                    {{-- si la verificacion aun no ha llegado se tiene la opcion de mandar de nuevo el correo--}}
                                {{ __('Si usted no ha recibido el correo electrónico') }}, <a href="{{ route('verification.resend') }}">{{ __('clic aquí para reenviar otra petición') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
