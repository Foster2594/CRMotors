<div class="form-group">
    {{ Form::label('name','Nombre*') }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('description','Descripción*') }}
    {{ Form::text('description',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('slug','Slug*') }}
    {{ Form::text('slug',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>
