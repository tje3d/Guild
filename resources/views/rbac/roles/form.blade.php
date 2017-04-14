@if(isset($role))
{!! Form::model($role, ['class' => 'form-horizontal']) !!}
@else
{!! Form::open(['class' => 'form-horizontal']) !!}
@endif
<div class="box">
	<div class="box-body">
		<div class="form-group {{$errors->first('name', 'has-error')}}">
			{!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
				{!!$errors->first('name', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
	</div>
</div>
<div class="box">
	<div class="box-body">
		@foreach(\Spatie\Permission\Models\Permission::get() as $permission)
		@php
		$checked = 	isset($role) ? $permissions->contains('id', $permission->id) : in_array($permission->id, old("permission[]", []));
		@endphp
		<div class="col-md-4">
			<div class="checkbox">
				<label>
					{!! Form::checkbox("permission[]", $permission->id, $checked) !!} {{$permission->name}}
				</label>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="box">
	<div class="box-footer">
		<div class="col-sm-offset-2">
			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
</div>
{!! Form::close() !!}