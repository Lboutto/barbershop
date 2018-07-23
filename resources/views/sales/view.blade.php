@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.alert')
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Venta</div>
                <div class="panel-body">
                    {!! Form::model($sale, ['route' => ['sales.update', $sale->id], 'method' => 'PUT', 'files' => true]) !!}
                        @include('sales.partials.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop()