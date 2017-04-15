@extends('layouts.panel')

@section('title', 'Addons')

@section('breadcrumb')
<li><a href="{{route('addons')}}">Addons</a></li>
@stop

@section('content')
<div class="row">
	{!! Form::open(['files' => true]) !!}
	<div class="col-xs-12">
		<div class="box">
			<div class="box-body">
				<div class="form-group {{$errors->first('name_create', 'has-error')}}">
					{!! Form::label('name_create', 'Name') !!}
					{!! Form::text('name_create', null, ['class' => 'form-control']) !!}
					{!! $errors->first('name_create', '<div class="help-block">:message</div>') !!}
				</div>
				<div class="form-group {{$errors->first('version_create', 'has-error')}}">
					{!! Form::label('version_create', 'Version') !!}
					{!! Form::text('version_create', null, ['class' => 'form-control']) !!}
					{!! $errors->first('version_create', '<div class="help-block">:message</div>') !!}
				</div>
				<div class="form-group {{$errors->first('description_create', 'has-error')}}">
					{!! Form::label('description_create', 'Description') !!}
					{!! Form::textarea('description_create', null, ['class' => 'form-control', 'rows' => 5]) !!}
					{!! $errors->first('description_create', '<div class="help-block">:message</div>') !!}
				</div>
				<div class="form-group {{$errors->first('file_create', 'has-error')}}">
					{!! Form::file('file_create', ['class' => 'form-control']) !!}
					{!! $errors->first('file_create', '<div class="help-block">:message</div>') !!}
				</div>
			</div>
			<div class="box-footer">
				<div class="btn-group btn-group-justified">
					<div class="btn-group" role="group">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-arrow-up"></i>
							Upload
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
<div class="row">
	@foreach($addons as $addon)
	<div class="col-sm-6 col-md-4">
		{!! Form::model($addon, ['url' => route('addons.update', $addon), 'files' => true]) !!}
		<div class="box">
			<div class="box-body">
				<div class="form-group {{$errors->first('name', 'has-error')}}">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
					{!! $errors->first('name', '<div class="help-block">:message</div>') !!}
				</div>
				<div class="form-group {{$errors->first('version', 'has-error')}}">
					{!! Form::label('version', 'Version') !!}
					{!! Form::text('version', null, ['class' => 'form-control']) !!}
					{!! $errors->first('version', '<div class="help-block">:message</div>') !!}
				</div>
				<div class="form-group {{$errors->first('description', 'has-error')}}">
					{!! Form::label('description', 'Description') !!}
					{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) !!}
					{!! $errors->first('description', '<div class="help-block">:message</div>') !!}
				</div>
				<a href="{{$addon->getFirstMedia('files')->getUrl()}}" class="label label-default">{{pathinfo($addon->getFirstMedia('files')->getPath(), PATHINFO_BASENAME)}}</a>
				<div class="form-group {{$errors->first('file', 'has-error')}}">
					{!! Form::file('file', ['class' => 'form-control']) !!}
					{!! $errors->first('file', '<div class="help-block">:message</div>') !!}
				</div>
			</div>
			<div class="box-footer">
				<div class="btn-group btn-group-justified">
					<div class="btn-group" role="group">
						<a href="{{route('addons.delete', $addon)}}" class="btn btn-default" onclick="return confirm('You sure?')">
							<i class="fa fa-trash"></i>
							Delete
						</a>
					</div>
					<div class="btn-group" role="group">
						<button type="submit" class="btn btn-success">
							Update
						</button>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
	@endforeach
</div>
@stop

@push("scripts")
<script>
var table = $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{!! route('users.datatable', request()->all()) !!}",
    columns: [
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'created_at', name: 'created_at' },
        { data: 'action', name: 'action', searchable: false, orderable: false },
    ],
    order: [[0, 'desc']]
});
</script>
@endpush