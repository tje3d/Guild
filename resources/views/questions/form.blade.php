@if(isset($question))
{!! Form::model($question, ['class' => 'form-horizontal']) !!}
@else
{!! Form::open(['class' => 'form-horizontal']) !!}
@endif
<div class="box">
	<div class="box-body">
		<div class="form-group {{$errors->first('ask', 'has-error')}}">
			{!! Form::label('ask', 'Ask', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::textarea('ask', null, ['class' => 'form-control', 'spellcheck' => false]) !!}
				{!!$errors->first('ask', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="form-group {{$errors->first('type', 'has-error')}}">
			{!! Form::label('type', 'Type', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('type', ['textarea' => 'Textarea', 'checkbox' => 'Checkbox', 'radio' => 'Radio', 'text' => 'Text'], null, ['class' => 'form-control']) !!}
				{!!$errors->first('type', '<span class="help-block">:message</span>')!!}
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