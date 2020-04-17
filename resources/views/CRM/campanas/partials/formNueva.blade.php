<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            {{ Form::label('nombre','Nombre Campaña *') }}
            {{ Form::text('nombre',null,['class' => 'form-control']) }}
            {{$errors->first('nombre')}}
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::label('descripcion','Descripción') }}
    {{ Form::text('descripcion',null,['class' => 'form-control']) }}
    {{$errors->first('descripcion')}}
</div>
<hr/>
<br/>
<div class="form-group">
    <label><h5>Duracion de campaña</h5></label>

    <div class="row">
        <div class="col-sm-3">
            <input type="radio" name="duracion" value="dia" checked onclick="Duracion(this)">
            {{ Form::label('Dia','Dia específico') }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <input type="radio" name="duracion" value="rango" onclick="Duracion(this)">
            {{ Form::label('Rango','Rango') }}
        </div>
    </div>
    <br/>
    {{--<div class="row">--}}
    <div id="duracion">

    </div>

</div>
<hr/>
<br/>
<div class="form-group">
    <label><h5>Aplicacion de rebajas o descuentos</h5></label>
    <div class="row">
        <div class=" col-sm-2">

            {{ Form::label('descuentoMinimo','Descuento Mínimo*') }}
            {{ Form::input('number','descuentoMinimo',0,['class' => 'form-control','min'=>"0",'max'=>"100"]) }}
            {{$errors->first('descuentoMinimo')}}
        </div>
        <div class="col-sm-2">
            {{ Form::label('descuentoMaximo','Descuento Máximo*') }}
            {{ Form::input('number','descuentoMaximo',0,['class' => 'form-control','min'=>"0",'max'=>"100"]) }}
            {{$errors->first('descuentoMaximo')}}
        </div>
    </div>
</div>
<hr/><br/>
{{--datos de clientes a aplicar la campaña--}}

<div class="form-group">
    <label><h5>Datos de clientes a aplicar la notificacion</h5></label>
    <div class="row">

        <div class="col-sm-4">
            {{ Form::label('idTipoCliente','Tipo de Cliente*') }}
            {{ Form::text('idTipoCliente',null,['class' => 'form-control']) }}
        </div>
        <div class="col-sm-4">
            {{ Form::label('idGenero','Género*') }}
            <div>
                {{ Form::select('idGenero', $genero, 0, ['placeholder' => 'Cualquier Género','class' => 'form-control btn dropdown-toggle btn-sm','id'=>'idGenero']) }}
            </div>
        </div>
        <div class="col-sm-4">
            {{ Form::label('fechaNacimiento','Fecha de Nacimiento*') }}
            {{ Form::date('fechaNacimiento',date_create("2000-02-02"),['class' => 'form-control']) }}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            {{ Form::label('idVehiculoInteres','Vehículo de Interés*') }}
            <div>
                {{ Form::select('idVehiculoInteres', $vehiculos, 0, ['placeholder' => 'Cualquier Vehículo','class' => 'form-control btn dropdown-toggle btn-sm']) }}
            </div>
        </div>
    </div>

    <hr/>
    {{--seccion de resultados --}}
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">

                {{ Form::label('idTipoCampana','Tipo de Campaña*') }}
                <div>
                    {{ Form::select('idTipoCampana', $tipos, 0, ['placeholder' => 'Cualquier Tipo de Campaña','class' => 'form control btn dropdown-toggle btn-sm']) }}
                </div>
            </div>
            <div class="col-sm-4">
                {{ Form::label('idSede','Sede*') }}
                <div>
                    {{ Form::select('idSede', $sedes, 0, ['placeholder' => 'Cualquier Sede','class' => 'form control btn dropdown-toggle btn-sm']) }}
                </div>
                {{$errors->first('idSede')}}
            </div>

            <hr/>
            <br/>
            <!--div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        {{ Form::label('idProvincia','Provincia*') }}
                        <div>
                            {{ Form::select('idProvincia', $provincias , null, ['placeholder' => 'Seleccione Provincia','class' => 'form control btn dropdown-toggle btn-sm']) }}
                        </div>

                        {{$errors->first('idProvincia')}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('idCanton','Cantón*') }}
                        <div>
                            {{ Form::select('idCanton', $cantones, null, ['placeholder' => 'Seleccione Cantón','class' => 'form control btn dropdown-toggle btn-sm']) }}
                        </div>
                        {{$errors->first('idCanton')}}
                    </div>
                </div>
            </div-->
            <hr/>
            <br/>
        </div>

        <div class="row">

        </div>

    </div>
    <hr/>
    <br/>
    <div class="form-group">
        <div class="row">

            <div class="col-sm-4">
                {{ Form::label('idNotificacion','Notificacion *') }}
                <div>
                    <a href="{{ route('campanas.index') }}"
                       class="btn btn-success">{{ _('Enviar Prueba') }}</a>
                </div>
            </div>

            <div class="col-sm-4">
                {{ Form::label('idEstadoCampana','Estado*') }}
                <div>
                    {{ Form::select('idEstadoCampana', $estados, null, ['placeholder' => 'Seleccione Estado','class' => 'form control btn dropdown-toggle btn-sm']) }}
                </div>
                {{$errors->first('idEstadoCampana')}}
            </div>
        </div>
    </div>
</div>
<hr/>
<br/>
<div class="form-group">
    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-success']) }}
    {{ Form::submit('Guardar y Enviar',['class' => 'btn btn-sm btn-success']) }}
    <a href="{{ route('campanas.index') }}" class="btn btn-sm btn-primary">{{ _('Regresar') }}</a>
</div>

<script>

    function Duracion(click) {

        $("#duracion").empty();

        if (click.value == 'rango') {


            let da = ` <div class=row>
                        <div class=col-sm-5>
                            {{ Form::label('fechaInicio','Fecha Inicio') }}
                    {{ Form::date('fechaInicio',null,['class' => 'form-control datatime']) }}
                    {{$errors->first('fechaInicio')}}
                </div>
                <div class=col-sm-3>
{{ Form::label('HoraI','Hora Inicio') }}
                    {{ Form::input('number','HoraI',0,['class' => 'form-control','min'=>"0",'max'=>'23']) }}
                </div>
                <div class=col-sm-3>
{{ Form::label('MinutoI','Minuto Inicio') }}
                    {{ Form::input('number','MinutoI',0,['class' => 'form-control','min'=>"0",'max'=>'59']) }}
                </div>
               </div>
               <div class=row>
                   <div class=col-sm-5>
{{ Form::label('fechaFinal','Fecha Final*') }}
                    {{ Form::date('fechaFinal',null,['class' => 'form-control']) }}
                    {{$errors->first('fechaFinal')}}
                </div>
                <div class=col-sm-3>
{{ Form::label('HoraF','Hora Final*') }}
                    {{ Form::input('number','HoraF',0,['class' => 'form-control','min'=>"0",'max'=>'23']) }}
                    {{$errors->first('HoraF')}}
                </div>
                <div class=col-sm-3>
{{ Form::label('MinutoF','Minuto Final') }}
                    {{ Form::input('number','MinutoF',0,['class' => 'form-control','min'=>"0",'max'=>'59']) }}
                </div>
   </div>`;
            $("#duracion").append(da);

        } else {
            let da = `<div class=row>
                <div class=col-sm-5>
                    {{ Form::label('fechaInicio','Fecha Inicio') }}
                    {{ Form::date('fechaInicio',null,['class' => 'form-control']) }}
                </div>
                <div class=col-sm-3>
                    {{ Form::label('HoraI','Hora Inicio') }}
                    {{ Form::input('number','HoraI',0,['class' => 'form-control','min'=>"0",'max'=>'23']) }}
                </div>
                <div class=col-sm-3>
                    {{ Form::label('MinutoI','Minuto Inicio') }}
                    {{ Form::input('number','MinutoI',0,['class' => 'form-control','min'=>"0",'max'=>'59']) }}
                </div>
                </div>`;


            $("#duracion").append(da);


        }
    }


</script>