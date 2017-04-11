@extends('layouts.panel')

@section('title', 'Users Create')

@section('breadcrumb')
<li><a href="{{route('users')}}">Users</a></li>
<li class="active">Create</li>
@stop

@section('content')
	@include('users.form')
@stop