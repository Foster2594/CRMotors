<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
    <title>Campañas Royal Motors</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header float-right">
                    <h2><b>Morrige Garage</b></h2>

                </div>
                <div class="card-body">
                    <p>
                        Le invita a participar de nuestra campaña {{$campana->nombre}} y aprovechar de nuestros <br>
                        <b size="24">DESCUENTOS</b> de: <br>
                        <br>
                        <b size="60"> {{$campana->descuentoMinimo }} %</b>   hasta   <b size="60"> {{$campana->descuentoMaximo }} %</b> <br>
                        {{--<img src="{{ asset('black') }}/img/img.png">--}}
                    Aprovecha ahora en la compra de tu automovil del año
                    <br/>
                    <h4>Dar click <a href="https://landing.mg.cr/">aquí</a> para mas informacion</h4>

                    </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<!--En esta vista se crean la para mostrar una de las cotizaciones-->
