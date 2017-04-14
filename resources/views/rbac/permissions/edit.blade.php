@extends('layouts.panel')

@section('title', "Edit Permission {$permission->name}")

@section('breadcrumb')
<li><a href="{{route('rbac.permissions')}}">Permissions</a></li>
<li class="active">Edit</li>
@stop

@section('content')
	@include('rbac.permissions.form')
@stop