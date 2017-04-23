@if(isset($tactic))
{!! Form::model($tactic, ['class' => 'form-horizontal', 'files' => true]) !!}
@else
{!! Form::open(['class' => 'form-horizontal', 'files' => true]) !!}
@endif
<div class="box">
	<div class="box-body">
		<div class="form-group {{$errors->first('title', 'has-error')}}">
			{!! Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('title', null, ['class' => 'form-control']) !!}
				{!!$errors->first('title', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="form-group {{$errors->first('content', 'has-error')}}">
			{!! Form::label('content', 'Content', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 20]) !!}
				{!!$errors->first('content', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		@if(isset($tactic))
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<a href="{{$tactic->getFirstMedia()->getUrl()}}" target="_blank">
					<img class="img-thumbnail" src="{{$tactic->getFirstMedia()->getUrl('thumb_small')}}">
				</a>
			</div>
		</div>
		@endif
		<div class="form-group {{$errors->first('image', 'has-error')}}">
			{!! Form::label('image', 'Image', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::file('image', ['class' => 'form-control']) !!}
				{!!$errors->first('image', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
	</div>
	<div class="box-footer">
		<div class="col-sm-offset-2">
			{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
</div>
{!! Form::close() !!}

@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'content' );
</script>
@endpush