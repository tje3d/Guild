@extends('layouts.panel')

@section('title', "Edit Role {$role->name}")

@section('breadcrumb')
<li><a href="{{route('rbac.roles')}}">Roles</a></li>
<li class="active">Edit</li>
@stop

@section('content')
	@include('rbac.roles.form')
@stop