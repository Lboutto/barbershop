@extends('layouts.app')
@section('title','Registrar Venta - '.config('app.name'))
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Registrar Venta</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'sales.store', 'method' => 'POST', 'files' => true]) !!}
                        @include('sales.partials.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop()