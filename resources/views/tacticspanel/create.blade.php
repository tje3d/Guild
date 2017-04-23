@extends('layouts.panel')

@section('title', 'Create New Tactic')

@section('breadcrumb')
<li><a href="{{route('tacticspanel')}}">Tactics</a></li>
<li class="active">Create</li>
@stop

@section('content')
	@include('tacticspanel.form')
@stop