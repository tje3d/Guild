<div class="form-group {{ $errors->first('name', 'has-error') }}">
{!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}

	<div class="col-md-9">
	{!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}

	{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group {{ $errors->first('email', 'has-error') }}">
{!! Form::label('email', 'Email', ['class' => 'col-md-2 control-label']) !!}

	<div class="col-md-9">
	{!! Form::text('email', null, ['class' => 'form-control', 'autofocus']) !!}

	{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group {{ $errors->first('level', 'has-error') }}">
{!! Form::label('level', 'Level', ['class' => 'col-md-2 control-label']) !!}

	<div class="col-md-9">
	{!! Form::text('level', null, ['class' => 'form-control']) !!}

	{!! $errors->first('level', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group {{ $errors->first('guild', 'has-error') }}">
{!! Form::label('guild', 'Guild', ['class' => 'col-md-2 control-label']) !!}

	<div class="col-md-9">
	{!! Form::text('guild', null, ['class' => 'form-control']) !!}

	{!! $errors->first('guild', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group {{ $errors->first('race_id', 'has-error') }}">
{!! Form::label('race_id', 'Race', ['class' => 'col-md-2 control-label']) !!}

	<div class="col-md-9">
	{!! Form::select('race_id', \App\Race::get()->pluck('name', 'id'), null, ['class' => 'form-control']) !!}

	{!! $errors->first('race_id', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group {{ $errors->first('klass_id', 'has-error') }}">
{!! Form::label('klass_id', 'Class', ['class' => 'col-md-2 control-label']) !!}

	<div class="col-md-9">
	{!! Form::select('klass_id', \App\Klass::get()->pluck('name', 'id'), null, ['class' => 'form-control']) !!}

	{!! $errors->first('klass_id', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group {{ $errors->first('faction', 'has-error') }}">
{!! Form::label('faction', 'Faction', ['class' => 'col-md-2 control-label']) !!}

	<div class="col-md-9">
	
	{!! Form::select('faction', ['Alliance' => 'Alliance', 'Horde' => 'Horde'], null, ['class' => 'form-control']) !!}

	{!! $errors->first('faction', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group {{ $errors->first('gender', 'has-error') }}">
{!! Form::label('gender', 'Gender', ['class' => 'col-md-2 control-label']) !!}

	<div class="col-md-9">
	{!! Form::select('gender', ['Male', 'Female'], null, ['class' => 'form-control']) !!}

	{!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="clearfix"></div>