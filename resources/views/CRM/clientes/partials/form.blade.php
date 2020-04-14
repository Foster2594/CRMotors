{{--@php--}}
    {{--$provincias = \App\Provincia::pluck('nombre', 'idProvincia');--}}
    {{--$cantones=[];--}}
    {{--$distritos=[];--}}
{{--@endphp--}}
<div class="form-group">
    {{ Form::label('idTipoCliente','Tipo de Cliente*') }}
    {{ Form::text('idTipoCliente',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('cedula','Cédula*') }}
    {{ Form::text('cedula',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('nombre','Nombre*') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('apellido1','Primer Apellido*') }}
    {{ Form::text('apellido1',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('apellido2','Segundo Apellido*') }}
    {{ Form::text('apellido2',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idGenero','Género*') }}
    <div>
        {{ Form::select('idGenero', $genero, null, ['placeholder' => 'Seleccione Género','class' => 'form-control btn dropdown-toggle btn-sm','id'=>'idGenero']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('idOcupacion','Ocupación*') }}

    <div>
        {{ Form::select('idOcupacion', $ocupacion, null, ['placeholder' => 'Seleccione una Ocupacion','class' => 'form-control btn dropdown-toggle btn-sm','id'=>'idOcupacion']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('numeroCelular','Teléfono Celular*') }}
    {{ Form::text('numeroCelular',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('otroTelefono','Otro Teléfono*') }}
    {{ Form::text('otroTelefono',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('correo','Correo*') }}
    {{ Form::text('correo',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('fechaNacimiento','Fecha de Nacimiento*') }}
    {{ Form::date('fechaNacimiento',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('ingresoSalarial','Ingreso Salarial*') }}
    {{ Form::text('ingresoSalarial',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idProvincia','Provincia*') }}
    <div>
        {{ Form::select('idProvincia', $provincias, null, ['placeholder' => 'Seleccione Provincia','class' => 'form-control btn dropdown-toggle btn-sm','id'=>'idProvincia']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('idCanton','Cantón*') }}
    <div>
        {{ Form::select('idCanton', $cantones, null, ['placeholder' => 'Seleccione Cantón','class' => 'form-control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('idDistrito','Distrito*') }}
    <div>
        {{ Form::select('idDistrito', $distritos, null, ['placeholder' => 'Seleccione Distrito','class' => 'form-control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('direccionExacta','Dirección Exacta*') }}
    {{ Form::text('direccionExacta',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('idVehiculoInteres','Vehículo de Interés*') }}
    <div>
        {{ Form::select('idVehiculoInteres', $vehiculos, null, ['placeholder' => 'Seleccione Vehículo','class' => 'form-control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('idEmpleado','Vendedor') }}
    {{ Form::text('idEmpleado',auth()->id(),['class' => 'form-control','readonly'=>'true']) }}
</div>
<div class="form-group">
    {{ Form::label('idEstadoCliente','Estado*') }}
    {{ Form::text('idEstadoCliente',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('clientes.indexCartera') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>
