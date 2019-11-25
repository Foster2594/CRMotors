<div class="form-group">
    {{ Form::label('nombre','Nombre Campana*') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('descripcion','Descripcion*') }}
    {{ Form::text('Descripcion',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('fechaInicio','Fecha de Inicio*') }}
    {{ Form::text('fechaInicio',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('fechaFinal','Fecha de finalizacion *') }}
    {{ Form::text('idProvincia',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('descuentoMinimo','Descuento minimo para el cliente *') }}
    {{ Form::text('descuentoMinimo',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('descuentoMaximo','Descuento maximo para el cliente  *') }}
    {{ Form::text('descuentoMaximo',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('idEmpleadoCreador','Creada por  *') }}
    {{ Form::text('idEmpleadoCreador',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('idEmpleadoAprobador','Aprovada por   *') }}
    {{ Form::text('idEmpleadoAprobador',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
</div>
