@php
$defaultValue = (isset($answers) && !is_null($answers)) ? $answers->where('question_id', $question->id)->first()->data : null;
@endphp

@if($question->type == "textarea")
{!! Form::textarea("question[{$question->id}]", $defaultValue, ['class' => 'form-control', 'placeholder' => 'type here...']) !!}
@elseif($question->type == "text")
{!! Form::text("question[{$question->id}]", $defaultValue, ['class' => 'form-control', 'placeholder' => 'type here...']) !!}
@elseif($question->type == "radio")
<div class="">
	<label>
		{!! Form::radio("question[{$question->id}]", 'yes', $defaultValue == "yes") !!}
		Yes
	</label>
</div>
<div class="">
	<label>
		{!! Form::radio("question[{$question->id}]", 'no', $defaultValue == "no") !!}
		No
	</label>
</div>
@endif