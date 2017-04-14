@extends('layouts.panel')

@section('title', 'Image Gallery')

@section('breadcrumb')
<li><a href="{{route('imagegallery')}}">Image Gallery</a></li>
@stop

@section('content')
<div class="row">
	{!! Form::open(['files' => true]) !!}
	<div class="col-xs-12">
		<div class="box">
			<div class="box-body">
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
	@foreach($imageGalleries as $imageGallery)
	<div class="col-sm-6 col-md-4">
		<div class="box">
			<div class="box-body">
				<div style="background: url('{{$imageGallery->getFirstMedia('images')->getUrl('thumb')}}') black no-repeat center center; background-size: contain; height: 250px; width: 100%;"></div>
			</div>
			<div class="box-footer">
				<div class="btn-group btn-group-justified">
					<div class="btn-group" role="group">
						<a href="{{route('imagegallery.delete', $imageGallery)}}" class="btn btn-default" onclick="return confirm('You sure?')">
							<i class="fa fa-trash"></i>
							Delete
						</a>
					</div>
				</div>
			</div>
		</div>
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