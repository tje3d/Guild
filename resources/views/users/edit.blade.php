@extends('layouts.panel')

@section('title', 'Users Edit')

@section('breadcrumb')
<li><a href="{{route('users')}}">Users</a></li>
<li>{{$user->name}}</li>
<li class="active">Edit</li>
@stop

@section('content')
	@include('users.form')
@stop