@extends('layouts.panel')

@section('title', "Change Status of {$character->name}")

@section('breadcrumb')
<li><a href="{{route('characters')}}">Characters</a></li>
<li class="active">Status</li>
@stop

@section('content')
{!! Form::model($character, ['class' => 'form-horizontal']) !!}
<div class="panel panel-default">
	<div class="panel-body">
		<div class="form-group {{ $errors->first('status', 'has-error') }}">
		{!! Form::label('status', 'Status', ['class' => 'col-md-2 control-label']) !!}

			<div class="col-md-9">
			{!! Form::select('status', ['accepted' => 'Accepted', 'rejected' => 'Rejected', '' => 'Not Checked'], null, ['class' => 'form-control', 'autofocus']) !!}

			{!! $errors->first('status', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
		<div class="form-group {{ $errors->first('email', 'has-error') }}">
		{!! Form::label('email', 'Send Email?', ['class' => 'col-md-2 control-label']) !!}

			<div class="col-md-9">
			{!! Form::select('email', ['No', 'Yes'], old('email', session()->has('lastStatusMessage') ? 1 : 0), ['class' => 'form-control']) !!}

			{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
		<div class="form-group {{ $errors->first('message', 'has-error') }}" id="messageContainer" style="display: none;">
		{!! Form::label('message', 'Email Message', ['class' => 'col-md-2 control-label']) !!}

			<div class="col-md-9">
			{!! Form::textarea('message', old('message', session('lastStatusMessage')), ['class' => 'form-control']) !!}

			{!! $errors->first('message', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-9">
				<button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Save</button>
			</div>
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
	$("#email").on('change', function(){
		var val = $(this).val();
		if (val == 0) {
			$("#messageContainer").hide();
		} else {
			$("#messageContainer").show();
		}
	}).change();
</script>
@endpush