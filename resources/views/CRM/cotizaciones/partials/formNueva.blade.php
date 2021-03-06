<!--En este Form para generar las cotizaciones-->
<div class="form-group">
    {{ Form::date('fechaCreacion',today(),['class' => 'form-control-plaintext col-md-4']) }}
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            {{ Form::label('idCliente','Cliente*') }}
            <div>
            {{ Form::select('idCliente', $clientes, null, ['placeholder' => 'Seleccione Cliente','class' => 'form-control btn dropdown-toggle btn-sm']) }}
            </div>
        </div>
        <div class="col-sm-4">
            {{ Form::label('idEmpleado','Vendedor*') }}
            <div>
            {{ Form::select('idEmpleado',$empleados,null, ['placeholder' => 'Seleccione Vendedor','class' => 'form-control btn dropdown-toggle btn-sm']) }}
            </div>
        </div>
        <div class="col-sm-4">
            {{ Form::label('idCampana','Campaña*') }}
            <div>
                <a onchange="descuento()">
                {{ Form::select('idCampana', $campanas, null, ['placeholder' => 'Seleccione Campaña','class' => 'form-control btn dropdown-toggle btn-sm','onchange'=>'descuento()']) }}
                    <input type="hidden" name="idDescuento" id="idDescuento"/>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <h5>
        Detalle de Cotización
    </h5>
</div>
<div class="form-group">
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th width="10px">ID</th>
{{--                <th>Vehículo</th>--}}
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Impuesto</th>
                <th>SubTotal</th>
            </tr>
            </thead>
            <tbody id="cotizacion">
            <tr>
                <td>{{ "" }}</td>
{{--                <td>{{ "" }}</td>--}}
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
                    <button type="button" class="btn btn-primary" onclick="eliminarfila()">
                        Eliminar
                    </button>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-4">
        {{ Form::hidden('detalle',0,['class' => 'form-control','id'=>'jsonhidden']) }}
        {{ Form::hidden('operaciones',0,['class' => 'form-control','id'=>'operaciones']) }}
        {{ Form::hidden('numeroLineas',0,['class' => 'form-control','id'=>'numeroLineas']) }}
        {{ Form::hidden('hiddenCamp',$campanasG,['class' => 'form-control','id'=>'hiddenCamp']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('subTotal','SubTotal ($)' ,['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">
        {{ Form::text('subTotal',0,['class' => 'form-control-plaintext','id'=>'subtotal','readonly'=>'true']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('montoDescuento','Descuento ($)',['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">
        {{ Form::text('montoDescuento',0,['class' => 'form-control-plaintext','id'=>'descuento','readonly'=>'true']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('impuestoVentas','IVA ($)',['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">
        {{ Form::text('impuestoVentas',0,['class' => 'form-control-plaintext','id'=>'iva','readonly'=>'readonly']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('total','Total ($)',['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">
        {{ Form::text('total',0,['class' => 'form-control-plaintext','id'=>'total','readonly'=>'true']) }}
    </div>
</div>
<div class="form-group row">
    <div>
        {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
        <a href="{{ route('cotizaciones.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
    </div>
</div>

{{--modal--}}
<div class="form-group">
    <div class="modal"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" >
            <div class="modal-2black modal-content" style="background: #1d2124;  color: white;" >
                <div class="modal-header modal-2black">
                    <h4 class="modal-black justify-content-center" id="exampleModalLongTitle">Vehiculos disponibles</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="float: right">&times;</span>
                    </button>
                </div>
                <div class="modal-body" onclick="subtotal()">
                    <div class="card-body table-responsive">
                        <table class="table table-dark table-hover">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Código</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Tipo Vehiculo</th>
                                <th colspan="1"></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vehiculos as $vehiculo)
                                <tr>
                                    <td>{{ $vehiculo->idVehiculo }}</td>
                                    <td>{{ $vehiculo->codigo }}</td>
                                    <td>{{ $vehiculo->marca }}</td>
                                    <td>{{ $vehiculo->modelo }}</td>
                                    <td>{{ $vehiculo->annio }}</td>
                                    <td>{{ $vehiculo->idTipoVehiculo }}</td>
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
                        <button type="button" class="btn btn-primary" style="float: right;width: auto" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--//inicio javascript--}}
<script>
    let cont = 0;
    let sub = 0;
    var JsonOut = [];//json string global
    var JsonObj = [];//json object global
    var obj;//Json object global x fila del modal
    var numeroLinea;

    function agregafila(id) {

        var jsonIn = document.getElementById(id).value;
        obj = JSON.parse(jsonIn);
        numeroLinea = cont + 1;
        var descripcion = "Código: " + obj["codigo"].concat(", Marca: ", obj['marca'], ', Modelo: ', obj['modelo'], ', Año: ', obj['annio']);
//se agrega la linea a la tabla
        let precio=obj['precio'];
        let impuesto=precio*0.13;
        impuesto=impuesto.toFixed(2);
        let da = `<tr id="` + cont + `" data-id="` + cont + `">
                    <td width="10px">` + numeroLinea + `</td>
                    <td>` + descripcion + `</td>
                    <td><input class="form-control col-md-11" type="number" name="` + cont + `" id="cant` + numeroLinea + `" value="1" min="1" step="1" onclick=total(this)></td>
                    <td>` + obj['precio'] + `</td>
                    <td><input class="form-control-plaintext col-md-11" type="text" id="iva` + numeroLinea + `" value="` + impuesto  + `"></td>
                    <td><input class="form-control-plaintext col-md-11" type="text" id="sub` + numeroLinea + `" value="` + precio + `"></td>
                </tr>`;
        $("#cotizacion").append(da);
        cont++;
        //json de lineas de cotizacion
        agregajsonahidden();
    }

    function total(click) {
        //editar el json que se imprime oculto antes de enviarse
        var opJson = [];
        var numId = parseFloat(click.name) + 1;
        var cant = document.getElementById(click.id).value;
        var prec = JsonObj[click.name].precio;
        //multiplicacion y asigna el total
        let sub = parseFloat(cant) * parseFloat(prec);
        let iva = (parseFloat(cant) * parseFloat(prec))*0.13;
        let tot = sub + iva;
        document.getElementById("sub" + numId).value = tot.toFixed(2);
        document.getElementById("iva" + numId).value = iva.toFixed(2);
        JsonObj[click.name].cantidad = document.getElementById(click.id).value;
        JsonObj[click.name].montoTotal = tot;

        //agrega valores al json en modo string
        JsonObj.forEach(myFunction);
        function myFunction(item) {
            opJson.push(JSON.stringify(item));
        }
        document.getElementById('jsonhidden').value = JSON.stringify(opJson);
        subtotal();
    }

    function subtotal() {
        let num=0;
        let iva;
        let desc=document.getElementById('idDescuento').value;
        let tot;
        sub=0;
        for (let i = 1; i <= numeroLinea; i++) {

            num = document.getElementById("sub" + i).value;
            sub = parseFloat(sub) + parseFloat(num);

        }
        iva =sub*0.13;
        desc =sub*-desc;
        tot= sub+iva+desc;

        document.getElementById('subtotal').value =sub.toFixed(2);
        document.getElementById('iva').value = iva.toFixed(2);
        document.getElementById('descuento').value = desc.toFixed(2) ;
        document.getElementById('total').value = tot.toFixed(2);

    }

    function agregajsonahidden() {

        var detalle = {
            idDetalleCotizacion: numeroLinea,
            idVehiculo: obj["codigo"],
            cantidad: 1,
            porcentajeDescuento: 0,
            precio: obj["precio"],
            montoDescuento: 0,
            montoImpuesto: 0,
            montoTotal: obj["precio"]
        };
        JsonOut.push(JSON.stringify(detalle));
        document.getElementById('numeroLineas').value = numeroLinea;
        //se imprime el json resultado
        document.getElementById('jsonhidden').value = JSON.stringify(JsonOut);
        //se suma en los resultados
        subtotal();
        JsonObj.push(detalle);

    }

    function eliminarfila() {
        if (cont === 0) {
        } else {
            cont = cont - 1;
            $("#" + cont).remove();
        }
        agregajsonahidden();
        total();
        subtotal();
    }

//funciones de campaña
    function descuento() {
        let desc= document.getElementById('idCampana').value;
        let jsonCamp = document.getElementById('hiddenCamp').value;
        let objCamp = JSON.parse(jsonCamp);

        let des =objCamp[desc].descuentoMinimo;

        document.getElementById('idDescuento').value = des*0.01 ;

        subtotal();

    }

</script>
