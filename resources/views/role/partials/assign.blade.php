{!! Field::select('permission[]', $permissions, $permission_role, ['multiple' => true]) !!}
{!! Field::hidden('role_id', $role->id) !!}
{!! Field::hidden('role', $role->name) !!}
{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
<a href="{{ route('role.index') }}" class="btn btn-info">Regresar</a>
