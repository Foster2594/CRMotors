<div class="form-group">
    <div>
        {{ Form::select('idProveedor', $proveedores, null, ['placeholder' => 'Seleccione Proveedor','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
    {{$errors->first('idProveedor')}}
</div><br>
<div class="form-group">
    <div>
        {{ Form::select('idTipoVehiculo', $tipos, null, ['placeholder' => 'Seleccione Tipo Vehiculo','class' => 'form control btn dropdown-toggle btn-sm']) }}
    </div>
    {{$errors->first('idTipoVehiculo')}}
</div>

<div class="form-group">
    {{ Form::label('codigo','Codigo*') }}
    {{ Form::text('codigo',null,['class' => 'form-control']) }}
    {{$errors->first('codigo')}}
</div>

<div class="form-group">
    {{ Form::label('marca','Marca*') }}
    {{ Form::text('marca',null,['class' => 'form-control']) }}
    {{$errors->first('marca')}}
</div>
<div class="form-group">
    {{ Form::label('modelo','Modelo*') }}
    {{ Form::text('modelo',null,['class' => 'form-control']) }}
    {{$errors->first('modelo')}}
</div>
<div class="form-group">
    {{ Form::label('parametroVersion','Version*') }}
    {{ Form::text('parametroVersion',null,['class' => 'form-control']) }}
    {{$errors->first('parametroVersion')}}
</div>
<div class="form-group">
    {{ Form::label('annio','Año*') }}
    {{ Form::text('annio',null,['class' => 'form-control']) }}
    {{$errors->first('annio')}}
</div>
<div class="form-group">
    {{ Form::label('cantidadDisponible','Disponibles*') }}
    {{ Form::text('cantidadDisponible',null,['class' => 'form-control']) }}
    {{$errors->first('cantidadDisponible')}}
</div>
<div class="form-group">
    {{ Form::label('fechaIngreso','Fecha Ingreso*') }}
    {{ Form::date('fechaIngreso',null,['class' => 'form-control']) }}
    {{$errors->first('fechaIngreso')}}
</div>
<div class="form-group">
    {{ Form::label('fechaSalida','Fecha Salida*') }}
    {{ Form::date('fechaSalida',null,['class' => 'form-control']) }}
    {{$errors->first('fechaSalida')}}
</div>

<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
</div>
