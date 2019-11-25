@extends('layouts.app')

@section('content')
    <body style="background-color: black">
    <div  class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ ('CR Motors') }}</h1>

                        <img width="350" src="{{ asset('black') }}/img/logo.jpg" alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
