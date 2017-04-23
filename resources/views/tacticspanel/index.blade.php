@extends('layouts.panel')

@section('title', 'Tactics Manager')

@section('breadcrumb')
<li><a href="{{route('tactics')}}">Tactics</a></li>
<li class="active">Manager</li>
@stop

@section('content')
<div class="box">
	<div class="box-body">
		<div class="table-responsive">
			<table class="table" id="datatable">
				<thead>
					<tr>
						<th width="80">#</th>
						<th>Title</th>
						<th>Image</th>
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
    ajax: "{!! route('tacticspanel.datatable', request()->all()) !!}",
    columns: [
        { data: 'id', name: 'id' },
        { data: 'title', name: 'title' },
        { data: 'image', name: 'image', searchable: false, orderable: false },
        { data: 'action', name: 'action', searchable: false, orderable: false },
    ],
    order: [[0, 'asc']]
});
</script>
@endpush