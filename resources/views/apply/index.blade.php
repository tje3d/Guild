@extends('layouts.site', ['title' => 'Recruitment, Search Hero'])

@section('content')
<br>
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="nk-box-3">
			<h2 class="nk-title h3 text-xs-center">What is your hero name?</h2>
			<div class="nk-gap-1"></div>

			@include('components.alert-both')

			{!! Form::open() !!}
				{!! Form::text('hero', null, ['placeholder' => 'Hero Name *', 'autofocus', 'autocomplete' => 'off', 'class' => 'form-control text-xs-center ' . $errors->first('hero', 'nk-error')]) !!}
				{!! $errors->first('hero', '<div class="nk-error">:message</div>') !!}
				<div class="nk-gap"></div>
				{!! Form::text('email', null, ['placeholder' => 'Email Address *', 'autocomplete' => 'off', 'class' => 'form-control text-xs-center ' . $errors->first('email', 'nk-error')]) !!}
				{!! $errors->first('email', '<div class="nk-error">:message</div>') !!}
				<div class="nk-gap"></div>
				<button class="nk-btn nk-btn-lg nk-btn-block link-effect-4">Go Next Step <i class="ion-arrow-right-c"></i></button>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop