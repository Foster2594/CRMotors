<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
    <title>Cotizacion para enviar</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="float-right">
                    <p><strong><h2>Numero de cotizacion: COT-#00{{ $cotizacion->idEncabezadoCotizacion }}</h2></strong></p>
                    <p><strong>Fecha creacion: </strong>{{ $cotizacion->fechaCreacion }}</p>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div>
                    <div>
                        <div class="body ml-3">
                            <p><strong>Cliente: </strong>{{ $cotizacion->idCliente }}</p>
                            <p><strong>Empleado: </strong>{{ $cotizacion->idEmpleado }}</p>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="card">
                        <div><h2>Detalle de Cotizacion</h2></div>
                        <div class="body ml-3">
                            <div class="card-body table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th width="10px">ID</th>
                                        <th>Cantidad</th>
                                        <th>Porcentaje</th>
                                        <th>Precio</th>
                                        <th>Descuento</th>
                                        <th>Impuesto</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($detalles as $detalle)
                                        <tr>
                                            <td>{{ $detalle->idVehiculo }}</td>
                                            <td>{{ $detalle->cantidad }}</td>
                                            <td>{{ $detalle->porcentajeDescuento }}</td>
                                            <td>{{ $detalle->precio }}</td>
                                            <td>{{ $detalle->montoDescuento }}</td>
                                            <td>{{ $detalle->montoImpuesto }}</td>
                                            <td>{{ $detalle->montoTotal }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="body ml-3">
                            <p><strong>Numero de lineas: </strong>{{ $cotizacion->numeroLineas }}</p>
                            <p><strong>Campaña: </strong>{{ $cotizacion->idCampana }}</p>
                            <p><strong>Estado: </strong>{{ $cotizacion-> idEstadoCotizacion}}</p>
                            <p><strong>subtotal: </strong>{{ $cotizacion->subTotal }}</p>
                            <p><strong>Descuento: </strong>{{ $cotizacion->montoDescuento }}</p>
                            <p><strong>IVA: </strong>{{ $cotizacion->impuestoVentas }}</p>
                            <p><strong>Total: </strong>{{ $cotizacion->total }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<!--En esta vista se crean la para mostrar una de las cotizaciones-->
