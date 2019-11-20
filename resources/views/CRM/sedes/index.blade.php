@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Sedes
                    @can('sedes.create')
                    <a href="{{ route('sedes.create') }}" class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                        @endcan</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>ID Provincia</th>
                                <th>ID Canton</th>
                                <th>ID Distrito</th>
                                <th>Direccion</th>
                                <th>ID Estado/Sede</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sedes as $sede)
                            <tr>
                                <td>{{ $sede->idSede }}</td>
                                <td>{{ $sede->nombre }}</td>
                                <td>{{ $sede->telefono }}</td>
                                <td>{{ $sede->correo }}</td>
                                <td>{{ $sede->idProvincia }}</td>
                                <td>{{ $sede->idCanton }}</td>
                                <td>{{ $sede->idDistrito }}</td>
                                <td>{{ $sede->direccionExacta }}</td>
                                <td>{{ $sede->idEstadoSede }}</td>

                                <td width="10px">
                                    @can('sedes.show')
                                        <a href="{{ route('sedes.show', $sede->idSucursal) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                        <a href="{{ route('sedes.show', $sede->nombre) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                        <a href="{{ route('sedes.show', $sede->telefono) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                        <a href="{{ route('sedes.show', $sede->correo) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                        <a href="{{ route('sedes.show', $sede->idProvincia) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                        <a href="{{ route('sedes.show', $sede->idCanton) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                        <a href="{{ route('sedes.show', $sede->idDistrito) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                        <a href="{{ route('sedes.show', $sede->direccionExacta) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>
                                        <a href="{{ route('sedes.show', $sede->idEstadoSede) }}" class="btn btn-sm btn-success">
                                            Ver
                                        </a>

                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('sedes.edit')
                                    <a href="{{ route('sedes.edit', $sede->id) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('sedes.destroy')
                                    {!! Form::open(['route' => ['sedes.destroy', $sede->id],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sedes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-sedes').className+=' active';
    </script>
@endsection