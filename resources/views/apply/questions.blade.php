@extends('layouts.site', ['title' => 'Recruitment, Questions'])

@section('content')
<br>
{!! Form::open() !!}
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="nk-info-box bg-main-1">
			<div class="nk-info-box-icon">
				<i class="ion-information-circled"></i>
			</div>
			<ul style="margin-bottom: 0">
				<li>Hero Name: {{$heroName}}</li>
				<li>Level: {{$character->level()}}</li>
				<li>Guild: {{$character->guild() ?: 'none'}}</li>
				<li>Race: {{$character->race()}}</li>
				<li>Class: {{$character->klass()}}</li>
			</ul>
		</div>
	</div>
	<div class="col-md-8 offset-md-2">
		@foreach(\App\Question::get() as $question)
		<div class="form-group {{ $errors->first("question[{$question->id}]", 'nk-error') }}">
			{!! Form::label("question[{$question->id}]", $loop->index+1 . '. ' . $question->ask, ['class' => 'text-left']) !!}

			@include('components.question')
			{!! $errors->first("question[{$question->id}]", '<span class="nk-error">:message</span>') !!}
		</div>
		@endforeach
	</div>
	<div class="col-md-8 offset-md-2">
		<button class="nk-btn nk-btn-lg nk-btn-block link-effect-4">Submit <i class="ion-arrow-right-c"></i></button>
		<br>
	</div>
</div>
{!! Form::close() !!}
@stop