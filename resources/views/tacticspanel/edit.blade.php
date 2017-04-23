@extends('layouts.panel')

@section('title', 'Edit Tactic')

@section('breadcrumb')
<li><a href="{{route('tacticspanel')}}">Tactics</a></li>
<li class="active">Edit</li>
@stop

@section('content')
	@include('tacticspanel.form')
@stop