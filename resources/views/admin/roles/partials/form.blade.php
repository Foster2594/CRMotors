<div class="form-group">
    {{ Form::label('name','Nombre del Usuario*') }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('slug','URL amigable*') }}
    {{ Form::text('slug',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('description','Descripción*') }}
    {{ Form::text('description',null,['class' => 'form-control']) }}
</div>
<br/>
<h4>Permiso especial</h4>
<div class="form-group">
    <label>{{ Form::radio('special','all-access') }} Total acceso</label>
    <br/>
    <label>{{ Form::radio('special','no-access') }} Ningún acceso</label>
</div>
<h4>Lista de permisos</h4>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($permissions as $permission)
        <li>
            <label>
                {{ Form::checkbox('permissions[]', $permission->id, null)}}
                {{ $permission->name }}
                <em>({{ $permission->description ? : 'N/A'}})</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>
