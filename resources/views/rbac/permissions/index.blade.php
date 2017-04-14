@extends('layouts.panel')

@section('title', 'Permissions Manager')

@section('breadcrumb')
<li><a href="{{route('rbac.permissions')}}">Permissions</a></li>
<li class="active">Manager</li>
@stop

@section('content')
<div class="box">
	<div class="box-body">
		<div class="table-responsive">
			<table class="table" id="datatable">
				<thead>
					<tr>
						<th width="50">#</th>
						<th>Name</th>
						<th>Date Created</th>
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
    ajax: "{!! route('rbac.permissions.datatable', request()->all()) !!}",
    columns: [
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'created_at', name: 'created_at' },
        { data: 'action', name: 'action', searchable: false, orderable: false },
    ],
    order: [[0, 'desc']]
});
</script>
@endpush