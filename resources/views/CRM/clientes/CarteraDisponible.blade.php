@extends('layouts.app', ['pageSlug' => 'CarteraDisponible', 'page' => _('Clientes Disponibles'), 'contentClass' => 'CarteraDisponible'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="form-group card-header">
                        <h4>Clientes Disponibles</h4>
                        <div>
                            <p><label>Vendedor*</label>


                                    {{ Form::select('idEmpleado', $usuarios, null, ['placeholder' => 'Seleccione Vendedor','class' => 'form-control btn dropdown-toggle btn-sm','onchange'=>'setId()','id'=>'idEmpleado']) }}

                            </p>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Teléfono Celular</th>
                                <th>Correo</th>
                                <th>Ingreso Salarial</th>
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
                                        {{--<a href="{{ route('clientes.asignarCliente',[$clienteV->idCliente, $clienteV->idCliente]) }}"--}}
                                           {{--class="btn btn-sm btn-success">--}}
                                            {{--Asignar--}}
                                        {{--</a>--}}
                                        {!! Form::open(['route' => ['clientes.asignarClienteR',$clienteV->idCliente]]) !!}
                                        <button class="btn btn-sm btn-danger">Asignar</button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ Form::text('Empleado',0 ,['class' => 'form-control','id'=>'Empleado']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
<script>

    function setId() {
        document.getElementById('Empleado').value=document.getElementById('idEmpleado').value
    }

</script>

