<div class="form-group">
    {{ Form::label('nombre','Nombre Sucursal*') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('correo','Correo*') }}
    {{ Form::text('correo',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('telefono','Telefono*') }}
    {{ Form::text('telefono',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('idProvincia','Provincia *') }}
    {{ Form::text('idProvincia',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idCanton','Canton *') }}
    {{ Form::text('idCanton',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idDistrito','Distrito *') }}
    {{ Form::text('idDistrito',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('direccionExacta','Direccion *') }}
    {{ Form::textarea('direccionExacta',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idEstadoSede','Estado de Sede *') }}
    {{ Form::text('idEstadoSede',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
</div>
