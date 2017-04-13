@extends('layouts.site', ['title' => 'Rules'])

@section('content')
<br>
<div class="row">
	<div class="col-md-8 offset-md-2">
		{!! Markdown::parse(Setting::get('rules')) !!}
	</div>
</div>
@stop