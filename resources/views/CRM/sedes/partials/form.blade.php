<div class="form-group">
    {{--<input type="number" name="a" class="form-control" value="1" />--}}
    {{ Form::label('nombre','Nombre *') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
    {{$errors->first('nombre')}}
</div>
<div class="form-group">
    {{ Form::label('telefono','Telefono*') }}
    {{ Form::text('telefono',null,['class' => 'form-control']) }}
    {{$errors->first('telefono')}}
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
    {{ Form::label('idEstadoSede','Estado*') }}
    <div>
        {{ Form::select('idEstadoSede', $estados, null, ['placeholder' => 'Seleccione Estado Sede','class' => 'form-control btn dropdown-toggle btn-sm']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('sedes.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>
