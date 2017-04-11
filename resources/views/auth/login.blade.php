@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    {!! Form::open(['class' => 'form-horizontal']) !!}

                    <div class="form-group {{ $errors->first('email', 'has-error') }}">
                        {!! Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) !!}
                        
                        <div class="col-md-6">
                        	{!! Form::text('email', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

							{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                        {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}

                        <div class="col-md-6">
                            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}

							{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                	{!! Form::checkbox('remember') !!} Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                        	{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
