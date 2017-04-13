<div class="col-xs-12">
	@foreach(\App\Question::get() as $question)
	<div class="form-group {{ $errors->first("question[{$question->id}]", 'has-error') }}">
		{!! Form::label("question[{$question->id}]", $question->ask, ['class' => 'text-left']) !!}

		@include('components.question')
		{!! $errors->first("question[{$question->id}]", '<span class="help-block">:message</span>') !!}
	</div>
	@endforeach
</div>

<div class="clearfix"></div>