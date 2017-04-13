@component('mail::message')
<div><strong>Name:</strong> {{$name}}</div>
<div><strong>From:</strong> {{$from}}</div>

<div style="padding: 20px 0 0 0">
	{!! $text !!}
</div>
@endcomponent
