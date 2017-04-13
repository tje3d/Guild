@extends('layouts.panel')

@section('title', 'Create New Character')

@section('breadcrumb')
<li><a href="{{route('characters')}}">Characters</a></li>
<li class="active">Create</li>
@stop

@section('content')
{!! Form::open(['class' => 'form-horizontal']) !!}
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
		<div class="tab-pane" id="tab_2">@include('characters.tab_questions')</div>
	</div>
</div>
{!! Form::close() !!}
@stop