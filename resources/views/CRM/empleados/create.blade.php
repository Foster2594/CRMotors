<!--En esta vista se crean la para generar las empleados-->
@extends('layouts.app', ['pageSlug' => 'create', 'page' => _('Crear Empleado'), 'contentClass' => 'create'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Crear Empleado
                    </h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'empleados.store']) !!}
                        @include('CRM.empleados.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('provincia').addEventListener('change',cantones);
    document.getElementById('idCanton').addEventListener('change',distritos);
    function cantones() {

        let provincia=document.getElementById('provincia').value;
        cantoList='';
        data={provincia};

        axios.post('{{ route('search.canton') }}',data).then( response=>{
            response.data.forEach( data =>{
                cantoList+=`<option value=`+data.idCanton+`>`+data.nombre+`</option>`;
            });

            $('#idCanton').html(cantoList);
        });
    }
    function distritos() {
        let canton=document.getElementById('idCanton').value,
            DistritoList='',
            data={canton};
        axios.post('{{ route('search.distrito') }}',data).then( response=>{
            response.data.forEach( data =>{
                DistritoList+=`<option value=`+data.idDistrito+`>`+data.nombre+`</option>`;
            });
            $('#idDistrito').html(DistritoList);
        });
    }


</script>
@endsection
@section('script')
    <script>
        document.getElementById('nav-roles').className+=' active';
    </script>

@endsection
