<div class="card-body table-responsive">
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th width="10px">ID</th>
            <th>Tipo Vehiculo</th>
            <th>Codigo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th colspan="2">Operaciones</th>
            <th ></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->idVehiculo }}</td>
                <td>{{ $vehiculo->idTipoVehiculo }}</td>
                <td>{{ $vehiculo->codigo }}</td>
                <td>{{ $vehiculo->marca }}</td>
                <td>{{ $vehiculo->modelo }}</td>
                <td>{{ $vehiculo->annio }}</td>
                <td>{{ $vehiculo->Precio }}</td>
                <td width="10px">
                    <a href="{{ route('vehiculos.show', $vehiculo->idVehiculo) }}" class="btn btn-sm btn-success">
                        Ver
                    </a>
                </td>
                <td width="10px">
                    <a href="{{ route('cotizaciones.agregar', $vehiculo) }}" class="btn btn-sm btn-success" onclick=agregafila()>
                        Add
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
