<div class="form-group">
    {{ Form::label('fechaCreacion',today()) }}
    {{ Form::date('fechaCreacion',today(),['class' => 'form-control']) }}
</div>

<div class="form-group">
    <div class="row">

        <div class="col-md-4">
            {{ Form::label('idCliente','Cliente*') }}
            {{ Form::text('idCliente',1,['class' => 'form-control']) }}
        </div>
        <div class="col-md-4">

            {{ Form::label('idEmpleado','Empleado*') }}
            {{ Form::text('idEmpleado',1,['class' => 'form-control']) }}

        </div>
        <div class="col-md-4">
            {{ Form::label('idCampana','Campana *') }}
            {{ Form::text('idCampana',1,['class' => 'form-control']) }}
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

                <th width="10px">ID</th>
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
                    <td >{{ "" }}</td>

                </tr>

            </tbody>
            <tfoot class="footer">
            <tr>
                <td colspan="8">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Agregar
                    </button>

                </td>
            </tr>

            </tfoot>
        </table>
    </div>

</div>

<div class="form-group row">

    <div class="col-sm-4">


        {{ Form::hidden('numeroLineas',0,['class' => 'form-control','id'=>'numeroLineas']) }}
        {{ Form::textarea('detalle',0,['class' => 'form-control','id'=>'hidden']) }}

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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
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
                            <th></th>
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
                                    <a href="{{ route('vehiculos.show', $vehiculo->idVehiculo) }}"
                                       class="btn btn-sm btn-success">
                                        Ver
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-sm btn-success " data-dismiss="modal"
                                       onclick=agregafila("vehiculo{{$vehiculo->idVehiculo}}")>
                                        Agregar
                                    </a>
                                    <input type="hidden" id="vehiculo{{$vehiculo->idVehiculo}}" value="{{$vehiculo}}"/>
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
    let sub=0;
    var JsonOut=[];
    var obj;
    var numeroLinea;

    function sendData() {

        $.ajax({
            url:'/test',
            type: 'POST',
            dataType:'json',
            contentType: 'json',
            data: JSON.stringify(JsonOut),
            contentType: 'application/json; charset=utf-8',
        });
    }

    function enviar() {
        $.ajax({
            type: "POST",
            url:'/cotizacion/detalles' ,
            data: {'array': JSON.stringify(array)},//capturo array
            success: function(data){

            }
        });
    }

    function agregafila(id) {
        var jsonIn = document.getElementById(id).value;
        obj = JSON.parse(jsonIn);
        numeroLinea = cont + 1;
        var descripcion = obj["codigo"].concat(" marca: ", obj['marca'], 'modelo: ', obj['modelo']);
//se agrega la linea a la tabla
        let da = `<tr id="` + cont + `" data-id="` + cont + `">
                    <td width="10px">` + numeroLinea + `</td>
                    <td>` + obj["codigo"] + `   </td>
                    <td>` + descripcion + `</td>
                    <td><input class="form-control col-md-8" type="number" id="cant` + cont + `" value="1"></td>
                    <td>` + obj['precio'] + `</td>
                    <td><input class="form-control col-md-8" type="number" id="descuento` + cont + `" value="0"></td>
                    <td><input class="form-control col-md-8" type="number" id="impuesto` + cont + `" value="0"></td>
                    <td><input class="form-control col-md-8" type="number" id="impuesto` + cont + `" value="` + obj['precio'] + `"></td>
                </tr>`;
        $("#cotizacion").append(da);
        cont++;
        //json de lineas de cotizacion
        agregajsonahidden();

    }

    function subtotal(numero) {

        sub = parseFloat(sub) + parseFloat(numero);

        document.getElementById('subtotal').value=sub;
        document.getElementById('total').value=sub;

    }

    function agregajsonahidden() {

        var detalle = {
            idDetalleCotizacion: numeroLinea,
            idVehiculo: obj["codigo"],
            cantidad: 0,
            porcentajeDescuento: 0,
            precio: obj["precio"],
            montoDescuento: 0,
            montoImpuesto: 0,
            montoTotal: 0
        };
        JsonOut.push(JSON.stringify(detalle));
        document.getElementById('numeroLineas').value = numeroLinea;
        //se imprime el json resultado
        document.getElementById('hidden').value =  JSON.stringify(JsonOut);
        //se suma en los resultados
        subtotal(obj['precio']);
    }

    function eliminarfila() {
        if (cont === 0) {
        } else {
            cont = cont - 1;
            $("#" + cont).remove();

        }
    }


</script>