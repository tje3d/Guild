@extends('layouts.panel')

@section('title', "Edit {$character->name}")

@section('breadcrumb')
<li><a href="{{route('characters')}}">Characters</a></li>
<li class="active">Edit</li>
@stop

@section('content')
@if(isset($character))
{!! Form::model($character, ['class' => 'form-horizontal']) !!}
@else
{!! Form::open(['class' => 'form-horizontal']) !!}
@endif
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-info-circle text-primary"></i> Character Informations</a></li>
		<li><a href="#tab_2" data-toggle="tab"><i class="fa fa-question-circle text-primary"></i> Questions + Answers</a></li>
		<li class="pull-right">
			<button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Save</button>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab_1">@include('characters.tab_info')</div>
		<div class="tab-pane" id="tab_2">@include('characters.tab_questions', ['answers' => $character->answers])</div>
	</div>
</div>
{!! Form::close() !!}
@stop