@extends('layouts.app') 
@section('title','Ventas - '.config('app.name'))
@section('content')
<div class="container">
    <div class="col-md-1 col-md-offset-11" style="margin-bottom:10px;">
        <a href="{{ route('sales.create') }}" class="btn btn-success animated zoomIn">Nueva</a>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">      
            <div class="panel panel-primary">
                <div class="panel-heading">Ventas</div>
                <div class="panel-body">
                    <table class="table table-responsive table-striped data-table">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                            <tr data-id="{{ $sale->id }}">
                                <td>{{ $sale->id }}</td>
                                <td>{{ $sale->name }}</td>
                                <td>{{ $sale->description }}</td>
                                <td>{{ $sale->price }}</td>
                                <td class="actions-buttons">
                                    <a href="{{ route('sales.show', [$sale->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Ver">
                                        <i class="fa fa-eye animated zoomIn"></i></a>
                                    <a href="{{ route('sales.edit', [$sale->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Modificar">
                                        <i class="fa fa-edit animated zoomIn"></i></a>
                                    <a href="" class="btn btn-danger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                        <i class="fa fa-trash-o animated zoomIn"></i></a>
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
@stop() 
@section('js')
<script src="{{ asset('js/delete_data.js') }}"></script>
@endsection()