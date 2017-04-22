@extends('layouts.panel')

@section('title', 'Questions Manager')

@section('breadcrumb')
<li><a href="{{route('questions')}}">Questions</a></li>
<li class="active">Manager</li>
@stop

@section('content')
<div class="box">
	<div class="box-body">
		<div class="table-responsive">
			<table class="table" id="datatable">
				<thead>
					<tr>
						<th>#</th>
						<th>Ask</th>
						<th>Type</th>
						<th>Order</th>
						<th width="50"></th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
@stop

@push("scripts")
<script>
var table = $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{!! route('questions.datatable', request()->all()) !!}",
    columns: [
        { data: 'id', name: 'id' },
        { data: 'ask', name: 'ask' },
        { data: 'type', name: 'type', searchable: false },
        { data: 'order_column', name: 'order_column' },
        { data: 'action', name: 'action', searchable: false, orderable: false },
    ],
    order: [[3, 'asc']]
});
</script>
@endpush