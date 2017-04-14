@extends('layouts.panel')

@section('title', 'Settings - Stream')

@section('breadcrumb')
<li><a href="">Settings</a></li>
<li class="active">Stream</li>
@stop

@section('content')
{!! Form::open(['class' => 'form-horizontal']) !!}
<div class="box">
	<div class="box-body">
		<div class="form-group {{$errors->first('stream_channel', 'has-error')}}">
			{!! Form::label('stream_channel', 'Channel', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('stream_channel', Setting::get('stream_channel'), ['class' => 'form-control']) !!}
				{!!$errors->first('stream_channel', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="form-group {{$errors->first('stream_enable', 'has-error')}}">
			{!! Form::label('stream_enable', 'Enable', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::select('stream_enable', ['yes' => 'Yes', 'no' => 'No'], Setting::get('stream_enable'), ['class' => 'form-control']) !!}
				{!!$errors->first('stream_enable', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="form-group {{$errors->first('stream_autoplay', 'has-error')}}">
			{!! Form::label('stream_autoplay', 'AutoPlay', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::select('stream_autoplay', ['true' => 'Yes', 'false' => 'No'], Setting::get('stream_autoplay'), ['class' => 'form-control']) !!}
				{!!$errors->first('stream_autoplay', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="form-group {{$errors->first('stream_muted', 'has-error')}}">
			{!! Form::label('stream_muted', 'Muted', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-4">
				{!! Form::select('stream_muted', ['true' => 'Yes', 'false' => 'No'], Setting::get('stream_muted'), ['class' => 'form-control']) !!}
				{!!$errors->first('stream_muted', '<span class="help-block">:message</span>')!!}
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