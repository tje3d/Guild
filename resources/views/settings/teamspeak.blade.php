@extends('layouts.panel')

@section('title', 'Settings - TeamSpeak')

@section('breadcrumb')
<li><a href="">Settings</a></li>
<li class="active">TeamSpeak</li>
@stop

@section('content')
{!! Form::open(['class' => 'form-horizontal']) !!}
<div class="box">
	<div class="box-body">
		<div class="form-group {{$errors->first('teamspeak_server', 'has-error')}}">
			{!! Form::label('teamspeak_server', 'Server Address', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('teamspeak_server', Setting::get('teamspeak_server'), ['class' => 'form-control']) !!}
				{!!$errors->first('teamspeak_server', '<span class="help-block">:message</span>')!!}
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