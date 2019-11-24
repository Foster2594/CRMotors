@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Campañas

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
                                <td>{{ $campana->Nombre }}</td>
                                <td>{{ $campana->Descripcion }}</td>
                                <td>{{ $campana->FechaInicio }}</td>
                                <td>{{ $campana->FechaFinal }}</td>
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

                                    {!! Form::open(['route' => ['sedes.destroy', $campana->idCampana],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}

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
        document.getElementById('nav-sedes').className+=' active';
    </script>
@endsection