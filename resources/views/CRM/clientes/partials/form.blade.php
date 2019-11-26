
<div class="form-group">
    {{ Form::label('idTipoCliente','Nombre Sucursal*') }}
    {{ Form::text('idTipoCliente',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('cedula','Correo*') }}
    {{ Form::text('cedula',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('nombre','Telefono*') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('apellido1','Provincia *') }}
    {{ Form::text('apellido1',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('apellido2','Canton *') }}
    {{ Form::text('apellido2',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idGenero','Distrito *') }}
    {{ Form::text('idGenero',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idOcupacion','Direccion *') }}
    {{ Form::textarea('idOcupacion',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('numeroCelular','Estado de Sede *') }}
    {{ Form::text('numeroCelular',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('otroTelefono','Estado de Sede *') }}
    {{ Form::text('otroTelefono',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('correo','Estado de Sede *') }}
    {{ Form::text('correo',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('fechaNacimiento','Estado de Sede *') }}
    {{ Form::text('fechaNacimiento',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('ingresoSalarial','Estado de Sede *') }}
    {{ Form::text('ingresoSalarial',null,['class' => 'form-control']) }}
</div><div class="form-group">
    {{ Form::label('idProvincia','Estado de Sede *') }}
    {{ Form::text('idProvincia',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idCanton','Estado de Sede *') }}
    {{ Form::text('idCanton',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idDistrito','Estado de Sede *') }}
    {{ Form::text('idDistrito',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('direccionExacta','Estado de Sede *') }}
    {{ Form::text('direccionExacta',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
</div>
