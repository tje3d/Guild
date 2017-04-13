@extends('layouts.panel')

@section('title', 'User Profile')

@section('breadcrumb')
<li><a href="{{route('profile')}}">User Profile</a></li>
@stop

@section('content')
{!! Form::model(Auth::user(), ['class' => 'form-horizontal']) !!}
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
@stop