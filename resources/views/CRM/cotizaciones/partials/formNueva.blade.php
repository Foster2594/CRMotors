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
                {{--'idDetalleCotizacion',--}}
                {{--'idEncabezadoCotizacion',--}}
                {{--'idVehiculo',--}}
                {{--'cantidad',--}}
                {{--'porcentajeDescuento',--}}
                {{--'precio',--}}
                {{--'montoDescuento',--}}
                {{--'montoImpuesto',--}}
                {{--'montoTotal',--}}
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
                    <a href="#"
                       class="btn btn-sm btn-success" onclick="agregafila()">
                        Agregar
                    </a>
                </td>
            </tr>

            </tfoot>
        </table>

    </div>
</div>

<div class="form-group row">
    {{ Form::label('subTotal','subtotal' ,['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">

        {{ Form::text('subTotal',null,['class' => 'form-control','id'=>'subtotal']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('montoDescuento','Descuento',['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">
        {{ Form::text('montoDescuento',null,['class' => 'form-control','id'=>'descuento']) }}
    </div>
</div>
<div class="form-group row">

    {{ Form::label('impuestoVentas','IVA',['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">

        {{ Form::text('impuestoVentas',null,['class' => 'form-control','id'=>'iva']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('total','Total',['class' => 'col-sm-2 col-form-label offset-sm-6']) }}
    <div class="col-sm-4">

        {{ Form::text('total',null,['class' => 'form-control','id'=>'total']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
</div>
<script>

let cont=0;
    function agregafila() {
//        alert(
        let da = `<tr id="`+cont+`" data-sub="100">
                    <td width="10px">
                        <a href="#"
                           class="btn btn-sm btn-success">
                            Buscar
                        </a>
                    </td>
                    <td>`+cont+`</td>
                    <td>`+cont+`</td>
                    <td>`+cont+`</td>
                    <td>`+cont+`</td>
                    <td>`+cont+`</td>
                    <td>`+cont+`</td>
                    <td>100</td>


                </tr>`;
        $("#cotizacion").append(da);
        cont++;
        subtotal();
    }
    function subtotal() {
        let sub=0,numero;
        for (let i=0;cont>i;i++){
            numero=document.getElementById(i).dataset.sub;
            sub=parseFloat(sub)+parseFloat(numero);

        }
        alert(sub);
        document.getElementById('subtotal').value=sub;
        document.getElementById('total').value=sub;
    }

</script>