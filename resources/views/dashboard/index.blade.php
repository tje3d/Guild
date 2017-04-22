@extends('layouts.panel')

@section('title', 'Dashboard')

@section('breadcrumb')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="active">Index</li>
@stop

@section('content')
<div class="box">
	<div class="box-body">
		<div class="table-responsive">
			<p>Hi and Welcome back!</p>
			<h3>⬅ Use left menu to navigate.</h3>
		</div>
	</div>
</div>
@stop