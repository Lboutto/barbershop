@extends('layouts.app')
@section('title','Crear Permiso - '.config('app.name'))
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Crear Permiso</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'permission.store', 'method' => 'POST']) !!}
                            @include('permission.partials.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>  
</div>
@endsection
