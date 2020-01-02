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
<div class="form-group">
    <div>
        {{ Form::select('idGenero', $generos, null, ['placeholder' => 'Seleccione Género','class' => 'form control btn dropdown-toggle btn-sm']) }}
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
    {{ Form::label('idSede','Sede*') }}
    <div>
        {{ Form::select('idSede', $sedes, null, ['placeholder' => 'Seleccione Sede','class' => 'form-control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('idDepartamento','Departamento*') }}
    <div>
        {{ Form::select('idDepartamento', $departamentos, null, ['placeholder' => 'Seleccione Departamento','class' => 'form-control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('idUsuario','Usuario*') }}
    {{ Form::text('idUsuario',null,['class' => 'form-control']) }}
    {{$errors->first('idUsuario')}}
</div>
<div class="form-group">
    {{ Form::label('idEstadoEmpleado','Estado*') }}
    <div>
        {{ Form::select('idEstadoEmpleado', $estados, null, ['placeholder' => 'Seleccione Estado Empleado','class' => 'form-control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('empleados.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>
