<div class="form-group">
    {{ Form::label('cedula','Cedula *') }}
    {{ Form::text('cedula',null,['class' => 'form-control']) }}
    {{$errors->first('cedula')}}
</div>
<div class="form-group">
    {{--<input type="number" name="a" class="form-control" value="1" />--}}
    {{ Form::label('nombre','Nombre *') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
    {{$errors->first('nombre')}}

</div>
<div class="form-group">
    {{ Form::label('numeroTelefono','Telefono *') }}
    {{ Form::text('numeroTelefono',null,['class' => 'form-control']) }}
    {{$errors->first('numeroTelefono')}}
</div>
<div class="form-group">
    {{ Form::label('correo','Correo *') }}
    {{ Form::text('correo',null,['class' => 'form-control']) }}
    {{$errors->first('correo')}}
</div>
<div class="form-group">
    {{ Form::label('idEstadoProveedor','Estado *') }}
    <div>
        {{ Form::select('idEstadoProveedor', $estados, null, ['placeholder' => 'Seleccione Estado ','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
    {{$errors->first('idEstadoProveedor')}}
</div>
<div class="form-group">
    {{--<input type="submit" value="Guardar">--}}
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('proveedores.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>
