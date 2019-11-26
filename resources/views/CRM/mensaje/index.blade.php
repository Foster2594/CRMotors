@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Sedes

                            <a href="{{ route('mesanje.create', $mensaje) }}" class="btn btn-sm btn-primary float-right">
                                Crear
                            </a>

                    </h4>

                    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
                    <!-- Styles -->
                    <style>
                        html, body {
                            background-color: #fff;
                            color: #636b6f;
                            font-family: 'Nunito', sans-serif;
                            font-weight: 200;
                            height: 100vh;
                            margin: 0;
                        }
                        .content { text-align: center; }
                        .title { font-size: 84px; }
                    </style>

                    <br />
                    <div class="container box" style="width: 970px;">
                        <h1 style="text-align:center;"> {{ $data['name'] }} </h1>
                        <h3 align="center">{{ $data['message'] }}</h3>
                    </div> </div>

@endsection
@section('script')
    <script>
        document.getElementById('nav-sedes').className+=' active';
    </script>
@endsection