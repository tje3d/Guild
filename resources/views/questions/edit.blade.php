@extends('layouts.panel')

@section('title', 'Edit Question')

@section('breadcrumb')
<li><a href="{{route('questions')}}">Questions</a></li>
<li class="active">Edit</li>
@stop

@section('content')
	@include('questions.form')
@stop