<div class="col-md-4 col-md-offset-4">
    {!! Field::text('name') !!}
</div>
<div class="col-md-8"></div>
<br>
<div class="col-md-4 col-md-offset-4">
    <a href="{{ route('role.index') }}" class="btn btn-info animate zoomIn">
        Regresar
    </a>
    {!! Form::submit('Guardar', ['class' => 'btn btn-success animate zoomIn']) !!}
    
</div>
