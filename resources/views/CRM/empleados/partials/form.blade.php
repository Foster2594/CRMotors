<div class="form-group">
    {{ Form::label('cedula','Cédula*') }}
    {{ Form::text('cedula',null,['class' => 'form-control']) }}
    {{$errors->first('cedula')}}
</div>
<div class="form-group">
    {{ Form::label('nombre','Nombre*') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
    {{$errors->first('nombre')}}
</div>
<div class="form-group">
    {{ Form::label('apellido1','Primer Apellido*') }}
    {{ Form::text('apellido1',null,['class' => 'form-control']) }}
    {{$errors->first('apellido1')}}
</div>
<div class="form-group">
    {{ Form::label('apellido2','Segundo Apellido*') }}
    {{ Form::text('apellido2',null,['class' => 'form-control']) }}
    {{$errors->first('apellido2')}}
</div>
{{--<div class="form-group">
    {{ Form::label('idGenero','Genero *') }}
    --}}{{--{{ Form::text('idGenero',null,['class' => 'form-control']) }}--}}{{--
    <div>
        {{ Form::select('idGenero', $idGenero, null, ['placeholder' => 'Seleccione Género','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
    {{$errors->first('idGenero')}}
</div>--}}
<div class="form-group">
    {{ Form::label('telefonoCelular','Telefono Celular*') }}
    {{ Form::text('telefonoCelular',null,['class' => 'form-control']) }}
    {{$errors->first('telefonoCelular')}}
</div>
<div class="form-group">
    {{ Form::label('otroTelefono','Otro Telefono*') }}
    {{ Form::text('otroTelefono',null,['class' => 'form-control']) }}
    {{$errors->first('otroTelefono')}}
</div>
<div class="form-group">
    {{ Form::label('correo','Correo*') }}
    {{ Form::text('correo',null,['class' => 'form-control']) }}
    {{$errors->first('correo')}}
</div>
<div class="form-group">
    {{ Form::label('idProvincia','Provincia *') }}
    <div>
        {{ Form::select('idProvincia', $provincias, null, ['placeholder' => 'Seleccione Provincia','class' => 'form-control btn dropdown-toggle btn-sm','id'=>'idProvincia']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('idCanton','Canton *') }}
    <div>
        {{ Form::select('idCanton', $cantones, null, ['placeholder' => 'Seleccione Canton','class' => 'form-control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('idDistrito','Distrito *') }}
    <div>
        {{ Form::select('idDistrito', $distritos, null, ['placeholder' => 'Seleccione Distrito','class' => 'form-control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('direccionExacta','Direccion *') }}
    {{ Form::text('direccionExacta',null,['class' => 'form-control']) }}
    {{$errors->first('direccionExacta')}}
</div>
<div class="form-group">
    {{ Form::label('idSede','Sede *') }}
    {{ Form::text('idSede',null,['class' => 'form-control']) }}
    {{$errors->first('idSede')}}
</div>
<div class="form-group">
    {{ Form::label('idDepartamento','Departamento *') }}
    {{ Form::text('idDepartamento',null,['class' => 'form-control']) }}
    {{$errors->first('idDepartamento')}}
</div>
<div class="form-group">
    {{ Form::label('idEstadoEmpleado','Estado *') }}
    {{ Form::text('idEstadoEmpleado',null,['class' => 'form-control']) }}
    {{$errors->first('idEstadoEmpleado')}}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('empleados.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>
