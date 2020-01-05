@extends('layouts.app', ['pageSlug' => 'index', 'page' => _('Cartera de Clientes'), 'contentClass' => 'index'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Cartera de Clientes
                            <a href="{{ route('clientes.create', $clientes) }}" class="btn btn-sm btn-success float-right">
                                Crear
                            </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
{{--                                <th width="10px">Id</th>--}}
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Teléfono Celular</th>
                                <th colspan="4">&nbsp;</th>
                                <th ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>
{{--                                <td>{{ $cliente->idCliente }}</td>--}}
                                <td>{{ $cliente->cedula }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellido1 }}</td>
                                <td>{{ $cliente->apellido2 }}</td>
                                <td>{{ $cliente->numeroCelular }}</td>
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
                                    <a href="{{ route('clientes.quitarDeCartera', $cliente->idCliente) }}" class="btn btn-sm btn-success">
                                        Quitar Cartera
                                    </a>
                                </td>
                                @can('clientes.delete')
                                <td width="10px">
                                    {!! Form::open(['route' => ['clientes.destroy', $cliente->idCliente],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-success">
                                        Eliminar
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </div>
    {{--@include('CRM.clientes.partials.indexCartera')--}}
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-clientes').className+=' active';
    </script>
@endsection
