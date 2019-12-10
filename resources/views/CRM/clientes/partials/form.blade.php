{{--@php--}}
    {{--$provincias = \App\Provincia::pluck('nombre', 'idProvincia');--}}
    {{--$cantones=[];--}}
    {{--$distritos=[];--}}
{{--@endphp--}}
<div class="form-group">
    {{ Form::label('idTipoCliente','Tipo de cliente*') }}
    {{ Form::text('idTipoCliente',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idEmpleado','Empleado') }}
    {{ Form::text('idEmpleado',auth()->id(),['class' => 'form-control','readonly'=>'true']) }}
</div>
<div class="form-group">
    {{ Form::label('cedula','Cedula*') }}
    {{ Form::text('cedula',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('nombre','Nombre*') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('apellido1','Primer apellido*') }}
    {{ Form::text('apellido1',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('apellido2','Segundo apellido *') }}
    {{ Form::text('apellido2',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idGenero','Genero *') }}
    {{ Form::text('idGenero',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idOcupacion','Ocupacion*') }}
    {{ Form::textarea('idOcupacion',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('numeroCelular','Telefono *') }}
    {{ Form::text('numeroCelular',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('otroTelefono','Otro Telefono *') }}
    {{ Form::text('otroTelefono',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('correo','Correo *') }}
    {{ Form::text('correo',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('fechaNacimiento','Fecha de nacimiento *') }}
    {{ Form::date('fechaNacimiento',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('ingresoSalarial','Ingreso salarial *') }}
    {{ Form::text('ingresoSalarial',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idProvincia','Provincia *') }}
    {{--}}{{ Form::text('idProvincia',null,['class' => 'form-control']) }}--}}
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
    {{ Form::label('direccionExacta','Direccion exacta *') }}
    {{ Form::text('direccionExacta',null,['class' => 'form-control','placeholder' => 'Indique aqui las señas exactas ']) }}
</div>
<div class="form-group">
    {{ Form::label('idVehiculoInteres','Vehiculo de interes *') }}
    <div>
        {{ Form::select('idVehiculoInteres', $vehiculos, null, ['placeholder' => 'Seleccione vehiculo','class' => 'form-control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
{{--<div class="form-group">--}}
    {{--{{ Form::label('idEstadoCliente','Estado cliente *') }}--}}
    {{--{{ Form::text('idEstadoCliente',null,['class' => 'form-control']) }}--}}
{{--</div>--}}
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
</div>
