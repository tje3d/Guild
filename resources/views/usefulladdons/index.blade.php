@extends('layouts.site', ['title' => 'Addons'])

@push('styles')
<style>
	.downloadable-box {
		padding-right:  65px;
	}
	.downloadable-box .dlbtn {
		font-size: 25px;
	    width: 65px;
	    text-align: center;
	    position: absolute;
	    right: 0;
	    top: 0;
	    bottom: 0;
	    display: flex;
	    border-top-right: 5px;
	    border-bottom-right: 5px;
	    background: #454545;
	    color:  #e2f508;
	    align-items: center;
	    justify-content: center;
	}
</style>
@endpush

@section('content')
<br>
<div class="row">
	<div class="col-md-8 offset-md-2">
		@foreach(\App\Addon::get() as $addon)
		<div class="nk-box-rounded-1 bg-dark-4 downloadable-box">
			<span class="text-main-1">{{$addon->name}} </span>
			➡ <em>{{$addon->description}}</em>
			<i> - version: {{$addon->version}}</i>
			<a href="{{$addon->getFirstMedia('files')->getUrl()}}" class="pull-right dlbtn"><i class="ion-android-download"></i></a>
		</div>
		<br>
		@endforeach
	</div>
</div>
@stop