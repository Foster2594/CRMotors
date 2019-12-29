@extends('layouts.app', ['pageSlug' => 'create', 'page' => _('Crear Clientes '), 'contentClass' => 'create'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Cliente</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'clientes.store']) !!}
                        @include('CRM.clientes.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        import axios from 'axios';
        document.getElementById('idProvincia').addEventListener('change',cantones);
        document.getElementById('idCanton').addEventListener('change',distritos);
        function cantones() {
            alert('hola');
            let provincia=document.getElementById('idProvincia').value,
                cantoList='',
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
    {{--@include('CRM.includes.direccion')--}}
@endsection
