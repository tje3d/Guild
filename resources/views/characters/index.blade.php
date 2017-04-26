@extends('layouts.panel')

@section('title', 'Characters Manager')

@section('breadcrumb')
<li><a href="{{route('characters')}}">Characters</a></li>
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
						<th>Name</th>
						<th>Race</th>
						<th>Class</th>
						<th>Guild</th>
						<th>Status</th>
						<th>Date Joined</th>
						<th width="80"></th>
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
    ajax: "{!! route('characters.datatable', request()->all()) !!}",
    columns: [
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'race', name: 'race', searchable: false, orderable: false },
        { data: 'class', name: 'class', searchable: false, orderable: false },
        { data: 'guild', name: 'guild' },
        { data: 'status', name: 'status', searchable: false, orderable: false },
        { data: 'created_at', name: 'created_at', searchable: false },
        { data: 'action', name: 'action', searchable: false, orderable: false },
    ],
    order: [[0, 'desc']]
});
</script>
@endpush