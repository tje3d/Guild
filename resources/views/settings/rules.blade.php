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
@stop

@push('styles')
<link rel="stylesheet" href="http://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

@push('scripts')
<script src="http://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
	new SimpleMDE();
</script>
@endpush