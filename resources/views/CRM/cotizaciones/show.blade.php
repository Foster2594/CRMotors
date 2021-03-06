@extends('layouts.app', ['pageSlug' => 'show', 'page' => _('Ver Cotización'), 'contentClass' => 'show'])
<!--En esta vista se crean la para mostrar una de las cotizaciones-->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header float-right">
                        <h4>Ver Cotización</h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header"><h4>Información</h4></div>
                            <div class="body ml-3">
                                <p><strong>Número: </strong>COT-000{{ $cotizacion->idEncabezadoCotizacion }}</p>
                                <p><strong>Cliente: </strong>{{ $cotizacion->idCliente }}</p>
                                <p><strong>Vendedor: </strong>{{ $cotizacion->idEmpleado }}</p>
                                <p><strong>Fecha de Creación: </strong>{{ $cotizacion->fechaCreacion }}</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header"><h4>Detalle</h4></div>
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
                                <p><strong>Número de Líneas: </strong>{{ $cotizacion->numeroLineas }}</p>
                                <p><strong>Campaña: </strong>{{ $cotizacion->idCampana }}</p>
                                <p><strong>Estado: </strong>{{ $cotizacion-> idEstadoCotizacion}}</p>
                                <p><strong>SubTotal: </strong>{{ $cotizacion->subTotal }}</p>
                                <p><strong>Descuento: </strong>{{ $cotizacion->montoDescuento }}</p>
                                <p><strong>IVA: </strong>{{ $cotizacion->impuestoVentas }}</p>
                                <p><strong>Total: </strong>{{ $cotizacion->total }}</p>
                            </div>
                        </div>
                        <a href="{{ route('cotizaciones.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-cotizaciones').className += ' active';
    </script>
@endsection
