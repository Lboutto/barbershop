@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Asignar Rol <strong>{{ $role->name }}</strong></div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'role.save_assign', 'method' => 'POST']) !!}
                            @include('role.partials.assign')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
