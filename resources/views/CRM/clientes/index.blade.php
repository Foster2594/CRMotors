@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Cartera de Clientes

                            <a href="{{ route('clientes.create', $clientes) }}" class="btn btn-sm btn-primary float-right">
                                Crear
                            </a>

                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Tipo de cliente</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Genero</th>
                                <th>Ocupacion</th>
                                <th>Numero de celular</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->idCliente }}</td>
                                <td>{{ $cliente->idTipoCliente }}</td>
                                <td>{{ $cliente->cedula }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellido1 }}</td>
                                <td>{{ $cliente->apellido2 }}</td>
                                <td>{{ $cliente->idGenero }}</td>
                                <td>{{ $cliente->idOcupacion }}</td>
                                <td>{{ $cliente->numeroCelular }}</td>
                                <td>{{ $cliente->otroNumero }}</td>
                                <td>{{ $cliente->correo }}</td>
                                <td>{{ $cliente->fechaNacimiento }}</td>
                                <td>{{ $cliente->ingresoSalarial }}</td>
                                <td>{{ $cliente->idProvincia }}</td>
                                <td>{{ $cliente->idCanton }}</td>
                                <td>{{ $cliente->idDistrito }}</td>
                                <td>{{ $cliente->direccionExacta }}</td>
                                <td>{{ $cliente->idVehiculo }}</td>


                                <td width="10px">
                                    <a href="{{ route('clientes.show', $cliente->idCliente) }}" class="btn btn-sm btn-success">
                                        Ver
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('clientes.edit', $cliente->idCliente) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>

                                </td>
                                <td width="10px">

                                    {!! Form::open(['route' => ['clientes.destroy', $cliente->idCliente],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-clientes').className+=' active';
    </script>
@endsection