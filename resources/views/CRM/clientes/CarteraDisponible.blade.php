@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {!! Form::open(['route' => 'clientes.store']) !!}
                    <div>

                        {{ Form::select('idEmpleado', $usuarios, null, ['placeholder' => 'Seleccione un Empleado','class' => 'form control btn dropdown-toggle btn-sm']) }}

                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Numero de celular</th>
                                <th>Correo</th>
                                <th>Ingreso $</th>
                                <th>&nbsp;</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($clientesVacios as $clienteV)
                                <tr>
                                    <td>{{ $clienteV->idCliente }}</td>
                                    <td>{{ $clienteV->cedula }}</td>
                                    <td>{{ $clienteV->nombre }}</td>
                                    <td>{{ $clienteV->apellido1 }}</td>
                                    <td>{{ $clienteV->apellido2 }}</td>
                                    <td>{{ $clienteV->numeroCelular }}</td>
                                    <td>{{ $clienteV->correo }}</td>
                                    <td>{{ $clienteV->ingresoSalarial }}</td>
                                    <td width="10px">
                                        <button></button>
                                        <a href="{{ route('clientes.asignarCliente', $clienteV->idCliente) }}"
                                           class="btn btn-sm btn-success fa fa-cancel"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-roles').className += ' active';
    </script>
@endsection