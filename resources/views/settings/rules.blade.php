@extends('layouts.panel')

@section('title', 'Settings - Rules')

@section('breadcrumb')
<li><a href="">Settings</a></li>
<li class="active">Rules</li>
@stop

@section('content')
{!! Form::open(['class' => 'form-horizontal']) !!}
<div class="box">
	<div class="box-body">
		<div class="form-group {{$errors->first('rules', 'has-error')}}">
			{!! Form::label('rules', 'Rules', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::textarea('rules', Setting::get('rules'), ['class' => 'form-control', 'rows' => 35]) !!}
				{!!$errors->first('rules', '<span class="help-block">:message</span>')!!}
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

<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="box box-success">
			<div class="box-header with-border">
				Preview
			</div>
			<div class="box-body">
				{!! Markdown::parse(Setting::get('rules')) !!}
			</div>
		</div>
	</div>
</div>
@stop