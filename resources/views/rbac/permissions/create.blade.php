@extends('layouts.panel')

@section('title', 'Create Permission')

@section('breadcrumb')
<li><a href="{{route('rbac.permissions')}}">Permissions</a></li>
<li class="active">Create</li>
@stop

@section('content')
	@include('rbac.permissions.form')
@stop