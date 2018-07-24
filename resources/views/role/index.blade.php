@extends('layouts.app')
@section('title','Roles - '.config('app.name'))
@section('content')
<div class="container">
    <div class="col-md-1 col-md-offset-11" style="margin-bottom:10px;">
        <a href="{{ route('role.create') }}" class="btn btn-success animated zoomIn">Nuevo</a>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">            
            @include('layouts.alert')
           <div class="panel panel-primary">
                <div class="panel-heading">Panel - Roles</div>
                <div class="panel-body">                   
                    <table class="table table-responsive table-striped data-table">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr data-id="{{ $role->id }}">
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td class="actions-buttons">
                                    <a href="{{ route('role.assign', [$role->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><span class="fa fa-edit animated zoomIn"></span></a>
                                    <a href="" class="btn btn-danger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar"><span class="fa fa-trash-o animated zoomIn"></span></a>
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
{{ Form::open(['route' => ['role.delete', ':DATA_ID'], 'method' => 'delete', 'id' => 'form-delete']) }} 
{{ Form::close() }} 
@endsection 
@section('js')
<script src="{{ asset('js/delete_data.js') }}"></script>
@endsection()