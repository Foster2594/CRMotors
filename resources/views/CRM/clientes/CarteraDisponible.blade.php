@extends('layouts.app', ['pageSlug' => 'CarteraDisponible', 'page' => _('Clientes Disponibles'), 'contentClass' => 'CarteraDisponible'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {!! Form::open(['route' => ['clientes.asignarCliente']]) !!}
                    <div class="form-group card-header">
                        <h4>Clientes Disponibles</h4>
                        <div >
                            <p><strong>Vendedor</strong>
                                <a onchange="setId()">
                                    {{ Form::select('idEmpleado', $usuarios, null, ['placeholder' => 'Seleccione Vendedor','class' => 'form control btn dropdown-toggle btn-sm', 'onclick=setId()']) }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
{{--                                <th width="10px">ID</th>--}}
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
{{--                                    <td>{{ $clienteV->idCliente }}</td>--}}
                                    <td>{{ $clienteV->cedula }}</td>
                                    <td>{{ $clienteV->nombre }}</td>
                                    <td>{{ $clienteV->apellido1 }}</td>
                                    <td>{{ $clienteV->apellido2 }}</td>
                                    <td>{{ $clienteV->numeroCelular }}</td>
                                    <td>{{ $clienteV->correo }}</td>
                                    <td>{{ $clienteV->ingresoSalarial }}</td>
                                    <td width="10px">
                                        {{ Form::hidden('idCliente',$clienteV->idCliente,['class' => 'form-control','name'=>'idCliente']) }}
                                        {{ Form::submit('asignar',['class' => 'btn btn-sm btn-success']) }}
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
    <script>

        let emp;
        let strUser
        function setId() {
            emp = document.getElementById('selectEmpleados');
            strUser = emp.options[emp.selectedIndex].text;
            document.getElementById('idEmpleado').value = strUser;
            alert('j');
        }
    </script>
@endsection
@section('script')
    <script>


        document.getElementById('nav-clientes').className += ' active';
    </script>
@endsection
