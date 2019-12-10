
<div class="form-group">
    {{--<input type="number" name="a" class="form-control" value="1" />--}}
    {{ Form::label('nombre','Nombre Sucursal*') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
    {{$errors->first('nombre')}}
</div>
<div class="form-group">
    {{ Form::label('correo','Correo*') }}
    {{ Form::text('correo',null,['class' => 'form-control']) }}
    {{$errors->first('correo')}}
</div>

<div class="form-group">
    {{ Form::label('telefono','Telefono*') }}
    {{ Form::text('telefono',null,['class' => 'form-control']) }}
    {{$errors->first('telefono')}}
</div>

<div class="form-group">
    {{ Form::label('idProvincia','Provincia *') }}
    {{--{{ Form::text('idProvincia',null,['class' => 'form-control']) }}--}}
    <div>
        {{ Form::select('idProvincia', $provincias, null, ['placeholder' => 'Seleccione Provincia','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>

    {{$errors->first('idProvincia')}}
</div>
<div class="form-group">
    {{ Form::label('idCanton','Canton *') }}
    {{--}}{{ Form::text('idCanton',null,['class' => 'form-control']) }}--}}
    <div>
        {{ Form::select('idCanton', $cantones, null, ['placeholder' => 'Seleccione Canton','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
    {{$errors->first('idCanton')}}
</div>
<div class="form-group">
    {{ Form::label('idDistrito','Distrito *') }}
    {{--}}{{ Form::text('idDistrito',null,['class' => 'form-control']) }}--}}
    <div>
        {{ Form::select('idDistrito', $distritos, null, ['placeholder' => 'Seleccione Distrito','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
    {{$errors->first('idDistrito')}}
</div>
<div class="form-group">
    {{ Form::label('direccionExacta','Direccion *') }}
    {{ Form::textarea('direccionExacta',null,['class' => 'form-control']) }}
    {{$errors->first('direccionExacta')}}
</div>
<div class="form-group">
    {{ Form::label('idEstadoSede','Estado de Sede *') }}
    {{ Form::text('idEstadoSede',null,['class' => 'form-control']) }}
    {{$errors->first('idEstadoSede')}}
</div>

<div class="form-group">
    <input type="submit" value="Guardar">
    {{--{{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}--}}
</div>
