<div class="form-group">
    {{ Form::label('nombre','Nombre del Usuario *') }}
    {{ Form::text('nombre',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('correo','Correo*') }}
    {{ Form::text('correo',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('telefono','Telefono *') }}
    {{ Form::textarea('telefono',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
</div>