<div class="form-group">
    {{ Form::label('name','Nombre *') }}
    {{ Form::text('name',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('email','Correo *') }}
    {{ Form::text('email',null,['class' => 'form-control']) }}
</div>
<hr/>
<h4>Lista de Roles</h4>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($roles as $role)
        <li>
            <label>
                {{ Form::checkbox('roles[]', $role->id, null)}}
                {{ $role->name }}
                <em>({{ $role->description ? : 'N/A'}})</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    <button type="button" onclick="history.go(-1)" class="btn btn-sm btn-success">{{ _('Regresar') }}</button>
</div>
