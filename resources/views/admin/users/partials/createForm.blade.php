<div class="form-group">
    {{ Form::label('name','Nombre *') }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('email','Correo *') }}
    {{ Form::text('email',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('password','Contraseña *') }}
    {{ Form::text('password',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>
