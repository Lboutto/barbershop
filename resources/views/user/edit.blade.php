@extends('layouts.app')
@section('title','Editar Usuario - '.config('app.name'))
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar</div>
                    <div class="panel-body">
                        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT']) !!}
                            @include('user.partials.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
