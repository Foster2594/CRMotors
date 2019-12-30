@extends('layouts.app', ['pageSlug' => 'index', 'page' => _('Campaña'), 'contentClass' => 'index'])
<!--En esta vista se crean la para mostrar todas las campañas-->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Campaña
                            <a href="{{ route('campanas.create', $campanas) }}" class="btn btn-sm btn-primary float-right">
                                Crear
                            </a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Final</th>
                                <th>Descuento Minimo</th>
                                <th>Descuento Maximo</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($campanas as $campana)
                                <tr>
                                    <td>{{ $campana->idCampana }}</td>
                                    <td>{{ $campana->nombre }}</td>
                                    <td>{{ $campana->descripcion }}</td>
                                    <td>{{ $campana->fechaInicio }}</td>
                                    <td>{{ $campana->fechaFinal }}</td>
                                    <td>{{ $campana->descuentoMinimo }}</td>
                                    <td>{{ $campana->descuentoMaximo }}</td>
                                    <td width="10px">
                                        <a href="{{ route('campanas.show', $campana->idCampana) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                    </td>
                                    <td width="10px">
                                        <a href="{{ route('campanas.edit', $campana->idCampana) }}" class="btn btn-sm btn-success">
                                            Editar
                                        </a>
                                    </td>
                                    <td width="10px">
                                        <a href="{{ route('Email.enviaremail', $campana->idCampana) }}" class="btn btn-sm btn-success">
                                            Enviar
                                        </a>
                                    </td>
                                    <td width="10px">
                                        @can('campanas.delete')
                                        {!! Form::open(['route' => ['campanas.destroy', $campana->idCampana],
                                        'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                        {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $campanas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-campanas').className+=' active';
    </script>
@endsection
