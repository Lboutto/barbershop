@extends('layouts.app')
@section('title','Registrar Usuarios - '.config('app.name'))
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Crear Usuario</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'user.store', 'method' => 'POST']) !!}
                            @include('user.partials.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
