<div class="form-group">
    <div>
        {{ Form::select('idTipoCampana', $tipos, null, ['placeholder' => 'Seleccione Tipo Campaña','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
</div><br>
<div class="form-group">
    <div>
        {{ Form::select('idSede', $sedes, null, ['placeholder' => 'Seleccione Sede','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
    {{--{{$errors->first('idSede')}}--}}
</div><br>
<div class="form-group">
    <div>
        {{ Form::select('idEstadoCampana', $estados, null, ['placeholder' => 'Seleccione Estado Campaña','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
{{--    {{$errors->first('idEstadoCampana')}}--}}
</div>
<div class="form-group">
    {{ Form::label('nombre','Nombre Campana*') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
{{--    {{$errors->first('nombre')}}--}}
</div>
<div class="form-group">
    {{ Form::label('descripcion','Descripcion*') }}
    {{ Form::text('descripcion',null,['class' => 'form-control']) }}
{{--    {{$errors->first('descripcion')}}--}}
</div>
<div class="form-group">
    <div>
        {{ Form::select('idProvincia', $provincias, null, ['placeholder' => 'Seleccione Provincia','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
{{--    {{$errors->first('idProvincia')}}--}}
</div><br>
<div class="form-group">
    <div>
        {{ Form::select('idCanton', $cantones, null, ['placeholder' => 'Seleccione Canton','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
{{--    {{$errors->first('idCanton')}}--}}
</div>
<div class="form-group">
    {{ Form::label('fechaInicio','Fecha de Inicio*') }}
    {{ Form::date('fechaInicio',null,['class' => 'form-control']) }}
{{--    {{$errors->first('fechaInicio')}}--}}
</div>

<div class="form-group">
    {{ Form::label('fechaFinal','Fecha de finalizacion *') }}
    {{ Form::date('fechaFinal',null,['class' => 'form-control']) }}
{{--    {{$errors->first('fechaFinal')}}--}}
</div>

<div class="form-group">
    {{ Form::label('descuentoMinimo','Descuento minimo para el cliente *') }}
    {{ Form::text('descuentoMinimo',null,['class' => 'form-control']) }}
{{--    {{$errors->first('descuentoMinimo')}}--}}
</div>

<div class="form-group">
    {{ Form::label('descuentoMaximo','Descuento maximo para el cliente  *') }}
    {{ Form::text('descuentoMaximo',null,['class' => 'form-control']) }}
{{--    {{$errors->first('descuentoMaximo')}}--}}
</div>

<div class="form-group">
    {{ Form::label('idEmpleadoCreador','Creada por  *') }}
    {{ Form::text('idEmpleadoCreador',null,['class' => 'form-control']) }}
{{--    {{$errors->first('idEmpleadoCreador')}}--}}
</div>

<div class="form-group">
    {{ Form::label('idEmpleadoAprobador','Aprovada por   *') }}
    {{ Form::text('idEmpleadoAprobador',null,['class' => 'form-control']) }}
{{--    {{$errors->first('idEmpleadoAprovador')}}--}}
</div>

<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
</div>
