<div class="form-group">
    {{ Form::label('fechaCreacion','fecha creacion *') }}
    {{ Form::date('fechaCreacion',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('idCliente','Id cliente*') }}
    {{ Form::select('idCliente',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('idEmpleado','id Empleado*') }}
    {{ Form::text('idEmpleado',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('numeroLineas','Lineas *') }}
    {{ Form::text('numeroLineas',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idCampana','id Campana *') }}
    {{ Form::text('idCampana',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idEstadoCotizacion','Estado *') }}
    {{ Form::text('idEstadoCotizacion',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('subTotal','subtotal *') }}
    {{ Form::textarea('subTotal',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('montoDescuento','Descuento *') }}
    {{ Form::text('montoDescuento',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('impuestoVentas','impuesto *') }}
    {{ Form::text('impuestoVentas',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('total','Total *') }}
    {{ Form::text('total',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
</div>
