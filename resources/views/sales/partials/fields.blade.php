{!! Field::text('type', null, [isset($disable) ? 'disabled' : '']) !!}
{!! Field::text('name', null, [isset($disable) ? 'disabled' : '']) !!}
{!! Field::textarea('description', null, [isset($disable) ? 'disabled' : '']) !!}
{!! Field::number('price', null, [isset($disable) ? 'disabled' : '']) !!}
<!-- Button return -->
<a href="{{ route('sales.index') }}" class="btn btn-success animated zoomIn">
    <i class="fa fa-reply"></i>
    Regresar
</a>
<!-- Button save / edit -->
@if(isset($disable))
    <a href="{{ route('sales.edit', [$sale->id]) }}" class="btn btn-primary animated zoomIn">
       Modificar
    </a>
@else
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary animated zoomIn']) !!}
@endif