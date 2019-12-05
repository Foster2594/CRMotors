@extends('layouts.app')
<!--En esta vista se crean la para mostrar todas las cotizaciones-->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card col-md-3">

                    <div class="panel-content">
                        <h4>
                            <a href="{{ route('cotizaciones.nueva', $cotizaciones) }}"
                               class="btn btn-sm btn-primary float-right">
                                Crear Nueva Cotizacion
                            </a>
                        </h4>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="panel-content">
                            <h4>Cotizaciones</h4>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Empleado</th>
                                <th>Telefono</th>
                                <th>Total</th>
                                <th colspan="3"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cotizaciones as $cotizacion)
                                <tr>
                                    <td>{{ $cotizacion->idEncabezadoCotizacion }}</td>
                                    <td>{{ $cotizacion->nomcli }}</td>
                                    <td>{{ $cotizacion->nomemp }}</td>
                                    <td>{{ $cotizacion->tel }}</td>
                                    <td>{{ $cotizacion->total }}</td>
                                    <td width="10px">
                                        <a href="{{ route('cotizaciones.show', $cotizacion->idEncabezadoCotizacion) }}"
                                           class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                    </td>
                                    <td width="10px">
                                        <a href="{{ route('cotizaciones.edit', $cotizacion->idEncabezadoCotizacion) }}"
                                           class="btn btn-sm btn-success">
                                            Editar
                                        </a>

                                    </td>
                                    <td width="10px">
                                        <a href="{{ route('cotizaciones.pdf', $cotizacion->idEncabezadoCotizacion) }}" class="btn btn-sm btn-success float-right">
                                            PDF
                                        </a>

                                    </td>

                                    @can('admin')
                                    <td width="10px">

                                        {!! Form::open(['route' => ['cotizaciones.destroy', $cotizacion->idEncabezadoCotizacion],
                                        'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                        {!! Form::close() !!}

                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $cotizaciones->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-sedes').className += ' active';
    </script>
@endsection