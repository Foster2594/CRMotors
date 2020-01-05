@extends('layouts.app', ['pageSlug' => 'index', 'page' => _('Permisos'), 'contentClass' => 'index'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Permisos
                    @can('permissions.create')
                    <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                        @endcan</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">Id</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td width="10px">
                                    @can('permissions.show')
                                    <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-sm btn-success">
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('permissions.edit')
                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('permissions.destroy')
                                    {!! Form::open(['route' => ['permissions.destroy', $permission->id],
                                    'method' => 'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('nav-permissions').className+=' active';
    </script>
@endsection
