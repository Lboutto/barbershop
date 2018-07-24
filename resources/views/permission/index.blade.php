@extends('layouts.app') 
@section('title','Permisos - '.config('app.name'))
@section('content')
<div class="container">
    <div class="col-md-1 col-md-offset-11" style="margin-bottom:10px;">
        <a href="{{ route('permission.create') }}" class="btn btn-success animated zoomIn">Nuevo</a>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">            
            @include('layouts.alert')
            <div class="panel panel-primary">
                <div class="panel-heading">Panel - Permisos</div>
                <div class="panel-body">
                    <table class="table table-responsive table-striped data-table">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                            <tr data-id="{{ $permission->id }}">
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td class="actions-buttons">
                                    <a href="" class="btn btn-danger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif 
    </div>
</div>
{{ Form::open(['route' => ['permission.delete', ':DATA_ID'], 'method' => 'delete', 'id' => 'form-delete']) }} 
{{ Form::close() }} 
@endsection 
@section('js')
<script src="{{ asset('js/delete_data.js') }}"></script>
@endsection()