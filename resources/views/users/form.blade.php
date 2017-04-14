@if(isset($user))
{!! Form::model($user, ['class' => 'form-horizontal']) !!}
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
		<div class="form-group {{$errors->first('email', 'has-error')}}">
			{!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('email', null, ['class' => 'form-control']) !!}
				{!!$errors->first('email', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="form-group {{$errors->first('role_id', 'has-error')}}">
			{!! Form::label('role_id', 'Role', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('role_id', \Spatie\Permission\Models\Role::get()->pluck('name', 'id'), old('role_id', isset($user) ? $user->roles()->first()->id : null), ['class' => 'form-control']) !!}
				{!!$errors->first('role_id', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="form-group {{$errors->first('password', 'has-error')}}">
			{!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::password('password', ['class' => 'form-control']) !!}
				{!!$errors->first('password', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="form-group {{$errors->first('password_confirmation', 'has-error')}}">
			{!! Form::label('password_confirmation', 'Password Confirmation', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
				{!!$errors->first('password_confirmation', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
	</div>
	<div class="box-footer">
		<div class="col-sm-offset-2">
			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
</div>
{!! Form::close() !!}