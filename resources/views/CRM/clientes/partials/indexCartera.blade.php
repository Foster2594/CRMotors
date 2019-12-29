
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
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
                                <th>Ingreso Salarial</th>
                                <th>&nbsp;</th>
                                <th ></th>
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
                                    <a href="{{ route('clientes.asignaCartera', $clienteV->idCliente) }}" class="btn btn-sm btn-success fa fa-cancel"></a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
