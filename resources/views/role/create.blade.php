@extends('layouts.app')
@section('title','Crear Rol - '.config('app.name'))
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Crear Rol</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'role.store', 'method' => 'POST']) !!}
                            @include('role.partials.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
