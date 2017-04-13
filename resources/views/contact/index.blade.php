@extends('layouts.site', ['title' => 'Contact Us'])

@section('content')
<br>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="nk-box-3 bg-dark-1">
			<h2 class="nk-title h3 text-xs-center">Drop Us a Line</h2>
			<div class="nk-gap-2"></div>
			@include('components.alert-both')
			{!! Form::open(['class' => 'nk-form nk-form-ajax nk-form-style-1']) !!}
				{!! Form::email('email', null, ['placeholder' => 'Email *', 'class' => 'form-control ' . $errors->first('email', 'nk-error')]) !!}
				{!! $errors->first('email', '<div class="nk-error">:message</div>') !!}
				<div class="nk-gap-1"></div>
				{!! Form::text('name', null, ['placeholder' => 'Name *', 'class' => 'form-control ' . $errors->first('name', 'nk-error')]) !!}
				{!! $errors->first('name', '<div class="nk-error">:message</div>') !!}
				<div class="nk-gap-1"></div>
				{!! Form::textarea('message', null, ['placeholder' => 'Message *', 'class' => 'form-control ' . $errors->first('message', 'nk-error'), 'rows' => 5]) !!}
				{!! $errors->first('message', '<div class="nk-error">:message</div>') !!}
				<div class="nk-gap-1"></div>
				<button class="nk-btn nk-btn-lg link-effect-4 ready"><span class="link-effect-inner"><span class="link-effect-l"><span>Send</span></span><span class="link-effect-r"><span>Send</span></span><span class="link-effect-shade"><span>Send</span></span></span></button>
			{!! Form::close() !!}
		</div>
	</div>
</div>

<br>
@stop