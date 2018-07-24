@extends('layouts.app') @section('content')
@section('title','Usuarios - '.config('app.name'))
@section('content')
<div class="container">
    <div class="col-md-1 col-md-offset-11" style="margin-bottom:10px;">
        <a href="{{ route('user.create') }}" class="btn btn-success animated zoomIn">Nuevo</a>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
             @include('layouts.alert')
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-transform:uppercase">Panel - Usuarios</div>
                <div class="panel-body">
                    <table class="table table-responsive table-striped data-table">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr data-id="{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>rol</td>
                                <td class="actions-buttons">
                                    <a href="{{ route('user.edit', [$user->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <span class="fa fa-edit animated zoomIn"></span>
                                    </a>
                                    <a href=""  class="btn btn-danger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                        <span class="fa fa-trash-o animated zoomIn"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::open(['route' => ['user.delete', ':DATA_ID'], 'method' => 'delete', 'id' => 'form-delete']) }} 
{{ Form::close() }} 
@endsection 
@section('js')
<script src="{{ asset('js/delete_data.js') }}"></script>
@endsection()