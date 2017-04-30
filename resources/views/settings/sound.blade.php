@extends('layouts.panel')

@section('title', 'Settings - Sounds')

@section('breadcrumb')
<li><a>Settings</a></li>
<li><a href="{{route('settings.sound')}}">Sounds</a></li>
@stop

@section('content')
<div class="row">
	{!! Form::open(['files' => true]) !!}
	<div class="col-xs-12">
		<div class="box">
			<div class="box-body">
				<div class="form-group {{$errors->first('name', 'has-error')}}">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
					{!! $errors->first('name', '<div class="help-block">:message</div>') !!}
				</div>
				<div class="form-group {{$errors->first('file', 'has-error')}}">
					{!! Form::file('file', ['class' => 'form-control']) !!}
					{!! $errors->first('file', '<div class="help-block">:message</div>') !!}
				</div>
			</div>
			<div class="box-footer">
				<div class="btn-group btn-group-justified">
					<div class="btn-group" role="group">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-arrow-up"></i>
							Upload New Sound
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
<div class="box">
	<div class="box-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>File</th>
					<th>Created At</th>
					<th width="70"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($sounds as $sound)
				<tr class="{{$defaultSound == $sound->id ? 'success text-success' : ''}}">
					<td>{{$sound->id}}</td>
					<td>{{$sound->name}}</td>
					<td><a href="{{$sound->getFirstMedia()->getUrl()}}" class="label {{$defaultSound == $sound->id ? 'label-success' : 'label-default'}}">{{pathinfo($sound->getFirstMedia()->getPath(), PATHINFO_BASENAME)}}</a></td>
					<td>{{$sound->created_at->diffForHumans()}}</td>
					<td>
						<a href="{{route('settings.sound.delete', [$sound])}}" class="btn btn-xs btn-warning" onclick="return confirm('You sure?')"><i class="fa fa-trash"></i></a>
						<a href="{{route('settings.sound.select', [$sound])}}" class="btn btn-xs btn-primary"><i class="fa fa-check"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop