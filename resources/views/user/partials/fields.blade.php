<div class="col-md-6">{!! Field::text('name') !!}</div>
<div class="col-md-6">{!! Field::email('email') !!}</div>
<div class="col-md-6">{!! Field::select('role_id', $roles, isset($user_role) ? $user_role->role_id : '', ['required']) !!}</div>
@if(!isset($disable))
<div class="col-md-6">{!! Field::password('password') !!}</div>
<div class="col-md-6">{!! Field::password('password_confirmation') !!}</div>
@endif
<div class="col-md-4">
    <a href="{{ route('user.index') }}" class="btn btn-info animated zoomIn"> 
         <i class="fa fa-reply"></i>
           Regresar
    </a>
    {!! Form::submit('Guardar', ['class' => 'btn btn-success animated zoomIn']) !!}
</div>
