<div class="col-md-4 col-md-offset-4">
    {!! Field::text('nombre') !!}
</div>
<div class="col-md-8"></div>
<br>
<div class="col-md-4 col-md-offset-4">
    <a href="{{ route('permission.index') }}" class="btn btn-info animated zoomIn"> <i class="fa fa-reply"></i>Regresar</a>
    {!! Form::submit('Guardar', ['class' => 'btn btn-success animated zoomIn']) !!}
</div>
