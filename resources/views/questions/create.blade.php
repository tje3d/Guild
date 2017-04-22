@extends('layouts.panel')

@section('title', 'Create New Question')

@section('breadcrumb')
<li><a href="{{route('questions')}}">Questions</a></li>
<li class="active">Create</li>
@stop

@section('content')
	@include('questions.form')
@stop