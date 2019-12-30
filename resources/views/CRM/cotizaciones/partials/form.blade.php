<div class="form-group">
    {{ Form::label('fechaCreacion','Fecha de Creación *') }}
    {{ Form::date('fechaCreacion',null,['class' => 'form-control readonly']) }}
</div>

<div class="form-group">
    {{ Form::label('idCliente','Id Cliente*') }}
    {{ Form::text('idCliente',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('idEmpleado','Id Empleado*') }}
    {{ Form::text('idEmpleado',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('numeroLineas','Lineas *') }}
    {{ Form::text('numeroLineas',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idCampana','Id Campaña *') }}
    {{ Form::text('idCampana',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idEstadoCotizacion','Estado *') }}
    {{ Form::text('idEstadoCotizacion',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('subTotal','Subtotal *') }}
    {{ Form::text('subTotal',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('montoDescuento','Descuento *') }}
    {{ Form::text('montoDescuento',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('impuestoVentas','Impuesto *') }}
    {{ Form::text('impuestoVentas',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('total','Total *') }}
    {{ Form::text('total',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('cotizaciones.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>
