@extends('layouts.app', ['pageSlug' => 'index', 'page' => _('Usuarios'), 'contentClass' => 'index'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Usuarios
                        @can('users.create')
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary float-right">
                                Crear
                            </a>
                        @endcan</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px">
                                    @can('users.show')
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-success">
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                        @can('users.edit')

                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success">
                                        Editar
                                        <i class="tim-icons icon-tv-2"></i>
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('users.destroy')
                                    {!! Form::open(['route' => ['users.destroy', $user->id],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-users').className+=' active';
    </script>
@endsection
