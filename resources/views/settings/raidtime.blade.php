@extends('layouts.panel')

@section('title', 'Settings - RaidTime')

@section('breadcrumb')
<li><a href="">Settings</a></li>
<li class="active">RaidTime</li>
@stop

@section('content')
{!! Form::open(['class' => 'form-horizontal']) !!}
<div class="box">
	<div class="box-body">
		<div class="form-group {{$errors->first('raidtime', 'has-error')}}">
			{!! Form::label('raidtime', 'RaidTime', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('raidtime', Setting::get('raidtime'), ['class' => 'form-control']) !!}
				{!!$errors->first('raidtime', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="form-group {{$errors->first('raidtime_day', 'has-error')}}">
			{!! Form::label('raidtime_day', 'Daily RaidTimes', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::textarea('raidtime_day', Setting::get('raidtime_day'), ['class' => 'form-control', 'spellcheck' => 'false']) !!}
				{!!$errors->first('raidtime_day', '<span class="help-block">:message</span>')!!}
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