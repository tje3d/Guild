@extends('layouts.auth', ['title' => 'Login'])

@section('content')
{!! Form::open() !!}

<div class="form-group has-feedback {{ $errors->first('email', 'has-error') }}">
	{!! Form::text('email', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Email']) !!}
	<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group has-feedback {{ $errors->first('password', 'has-error') }}">
	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="col-xs-8">
			<div class="checkbox icheck">
				<label>
					{!! Form::checkbox('remember') !!} Remember Me
				</label>
			</div>
		</div>
		<div class="col-xs-4" style="padding-right: 0">
			<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
		</div>
	</div>
</div>

{!! Form::close() !!}
@endsection
