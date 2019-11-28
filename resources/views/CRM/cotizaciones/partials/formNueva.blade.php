<!--En este Form para generar las cotizaciones-->
<div class="form-group">
    {{ Form::label('fechaCreacion',today()) }}
    {{ Form::date('fechaCreacion',today(),['class' => 'form-control']) }}
</div>

<div class="form-group">
    <div class="row">

        <div class="col-md-4">
            {{ Form::label('idCliente','Cliente*') }}
            {{ Form::text('idCliente',null,['class' => 'form-control']) }}
        </div>
        <div class="col-md-4">

            {{ Form::label('idEmpleado','Empleado*') }}
            {{ Form::text('idEmpleado',null,['class' => 'form-control']) }}

        </div>
        <div class="col-md-4">
            {{ Form::label('idCampana','Campana *') }}
            {{ Form::text('idCampana',null,['class' => 'form-control']) }}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="center">
        Detalle de Cotizacion

    </div>
</div>
<div class="form-group">


    <div class="card-body table-responsive">

        <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th width="10px">#</th>
                <th>Vehiculo</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>precio</th>
                <th>descuento</th>
                <th>Impuesto</th>
                <th>SubTotal</th>
            </tr>
            </thead>
            <tbody id="cotizacion">

            <tr>
                <td>{{ "" }}</td>
                <td>{{ "" }}</td>
                <td>{{ "" }}</td>
                <td>{{ "" }}</td>
                <td>{{ "" }}</td>
                <td>{{ "" }}</td>
                <td>{{ "" }}</td>
                <td>{{ "" }}</td>
            </tr>

            </tbody>
            <tfoot class="footer">
            <tr>
                <td colspan="4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Agregar
                    </button>
                </td>
                <td colspan="4">
                    <a href="#"
                       class="btn btn-sm btn-success" onclick="eliminarfila()">
                        ELiminar
                    </a>
                </td>
                {{--<input type="text" id="idNumeroLinea" value="0" />--}}
            </tr>
            </tfoot>
        </table>

    </div>
</div>
<div class="form-group row">

    <div class="col-sm-4">

        {{ Form::text('numeroLineas',0,['class' => 'form-control','id'=>'numeroLineas']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('subTotal','subtotal' ,['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">

        {{ Form::text('subTotal',0,['class' => 'form-control','id'=>'subtotal']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('montoDescuento','Descuento',['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">
        {{ Form::text('montoDescuento',0,['class' => 'form-control','id'=>'descuento']) }}
    </div>
</div>
<div class="form-group row">

    {{ Form::label('impuestoVentas','IVA',['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">

        {{ Form::text('impuestoVentas',0,['class' => 'form-control','id'=>'iva']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('total','Total',['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">

        {{ Form::text('total',0,['class' => 'form-control','id'=>'total']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
</div>



{{--modal--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
// inicia el include
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
                                    <a href="#" class="btn btn-sm btn-success " data-dismiss="modal" onclick=agregafila("vehiculo{{$vehiculo->idVehiculo}}")>
                                        Add
                                    </a>
                                    <input type="hidden" id="vehiculo{{$vehiculo->idVehiculo}}" value="{{$vehiculo}}" />
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

{{--//inicio javascript--}}
<script>

    let cont = 0;
    let sub = 0;


    function agregafila(id) {

        var club_id = document.getElementById(id).value;
        var obj = JSON.parse(club_id);
        var numeroLinea= cont+1;
        let da = `<tr id="` + cont + `" data-sub="100">
                    <td width="10px">
                        `+numeroLinea+`
                    </td>
                    <td>` + obj["codigo"] + `</td>
                    <td>` +obj['marca']+ `</td>
                    <td><input class="form-control col-4" type="number" value="0"></td>
                    <td>` + obj['precio'] + `</td>
                    <td>` + 0 + `</td>
                    <td>` + 0 + `</td>
                    <td id="subtotal` + cont + `">` + obj['precio'] + `</td>
                </tr>`;
        $("#cotizacion").append(da);
        cont++;
        subtotal(obj['precio']);

        document.getElementById('numeroLineas').value=numeroLinea;
    }


    function eliminarfila() {
        if (cont === 0) {
        } else {
            cont = cont - 1;
            $("#" + cont).remove();
        }
    }

    function subtotal(num) {
        sub = parseFloat(sub) + parseFloat(num);

        document.getElementById('subtotal').value = sub;
        document.getElementById('total').value = sub;
    }


    function subtotacl() {
        let sub = 0, numero;
        for (let i = 0; cont > i; i++) {
            numero = document.getElementById('subtotali').value;
            sub = parseFloat(sub) + parseFloat(numero);
        }

        document.getElementById('subtotal').value = sub;
        document.getElementById('total').value = sub;
    }

</script>