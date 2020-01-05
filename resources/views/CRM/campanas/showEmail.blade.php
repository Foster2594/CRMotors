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
                <div class="card-header float-right">
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header"><h3>Campañas Disponibles</h3></div>
                    </div>
                    <div class="card">
                        <div class="card-header"><h4>Detalle de Campaña</h4></div>
                        <div class="body ml-3">
                            <div class="card-body table-responsive">
                                <div class="card-header"><h4>Detalles de la Campaña</h4></div>
                                    <tr>
                                        <th width="10px">ID</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Fecha Incio</th>
                                        <th>Fecha Final</th>
                                        <th>Descuento minimo</th>
                                        <th>Descuento maximo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($detalles as $detalle)
                                        <tr>
                                            <td>{{ $detalle->idCampana }}</td>
                                            <td>{{ $detalle->nombre }}</td>
                                            <td>{{ $detalle->descripcion }}</td>
                                            <td>{{ $detalle->fechaInicio }}</td>
                                            <td>{{ $detalle->fechaFinal }}</td>
                                            <td>{{ $detalle->descuentoMinimo }}</td>
                                            <td>{{ $detalle->descuentoMaximo }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
