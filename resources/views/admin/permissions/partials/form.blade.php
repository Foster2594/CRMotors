<div class="form-group">
    {{ Form::label('name','Nombre del permiso *') }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('description','Descripción del permiso *') }}
    {{ Form::text('description',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('slug','Slug del permiso *') }}
    {{ Form::text('slug',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <button type="button" onclick="history.go(-1)" class="btn btn-sm btn-success">{{ _('Regresar') }}</button>
</div>
