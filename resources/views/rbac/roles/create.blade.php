@extends('layouts.panel')

@section('title', 'Create Role')

@section('breadcrumb')
<li><a href="{{route('rbac.roles')}}">Roles</a></li>
<li class="active">Create</li>
@stop

@section('content')
	@include('rbac.roles.form')
@stop