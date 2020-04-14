<div class="form-group">
    {{ Form::label('nombre','Nombre Campaña *') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
    {{$errors->first('nombre')}}
</div>
<div class="form-group">
    {{ Form::label('descripcion','Descripción') }}
    {{ Form::text('descripcion',null,['class' => 'form-control']) }}
    {{$errors->first('descripcion')}}
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-3">
            {{ Form::label('fechaInicio','Fecha Inicio*') }}
            {{ Form::date('fechaInicio',null,['class' => 'form-control']) }}
            {{$errors->first('fechaInicio')}}
        </div>
        <div class="col-sm-3 offset-sm-6">
            {{ Form::label('fechaFinal','Fecha Final*') }}
            {{ Form::date('fechaFinal',null,['class' => 'form-control']) }}
            {{$errors->first('fechaFinal')}}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-2 offset-sm-8">

            {{ Form::label('descuentoMinimo','Descuento Mínimo*') }}
            {{ Form::text('descuentoMinimo',null,['class' => 'form-control']) }}
            {{$errors->first('descuentoMinimo')}}
        </div>
        <div class="col-sm-2">
            {{ Form::label('descuentoMaximo','Descuento Máximo*') }}
            {{ Form::text('descuentoMaximo',null,['class' => 'form-control']) }}
            {{$errors->first('descuentoMaximo')}}
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::label('idTipoCampana','Tipo de Campaña*') }}
    <div>
        {{ Form::select('idTipoCampana', $tipos, null, ['placeholder' => 'Seleccione Tipo de Campaña','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('idSede','Sede*') }}
    <div>
        {{ Form::select('idSede', $sedes, null, ['placeholder' => 'Seleccione Sede','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
    {{$errors->first('idSede')}}
</div>
<div class="form-group">
    {{ Form::label('idProvincia','Provincia*') }}
    <div>
        {{ Form::select('idProvincia', $provincias , null, ['placeholder' => 'Seleccione Provincia','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>

    {{$errors->first('idProvincia')}}
</div>
<div class="form-group">
    {{ Form::label('idCanton','Cantón*') }}
    <div>
        {{ Form::select('idCanton', $cantones, null, ['placeholder' => 'Seleccione Cantón','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
    {{$errors->first('idCanton')}}
</div>
<div class="form-group">
    {{ Form::label('idEmpleadoCreador','Creada por*') }}
    {{ Form::text('idEmpleadoCreador',null,['class' => 'form-control']) }}
    {{$errors->first('idEmpleadoCreador')}}
</div>
<div class="form-group">
    {{ Form::label('idEmpleadoAprobador','Aprobada por*') }}
    {{ Form::text('idEmpleadoAprobador',null,['class' => 'form-control']) }}
    {{$errors->first('idEmpleadoAprovador')}}
</div>
<div class="form-group">
    {{ Form::label('idEstadoCampana','Estado*') }}
    <div>
        {{ Form::select('idEstadoCampana', $estados, null, ['placeholder' => 'Seleccione Estado','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
    {{$errors->first('idEstadoCampana')}}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('campanas.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>
