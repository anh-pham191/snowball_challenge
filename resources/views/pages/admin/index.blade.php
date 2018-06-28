@extends('layouts.admin.application',['menu' => 'dashboard'] )

@section('metadata')
@stop

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

@stop

@section('scripts')
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

@stop

@section('title')
{{ config('site.name') }} | Admin | Dashboard
@stop

@section('header')
Dashboard
@stop

@section('content')
<table id="table" class="table table-striped table-bordered">
	<thead>
		<tr>
	    	<th>First Name</th>
	    	<th>Last Name</th>
	    	<th>Email</th> 
	    	<th>Website</th>
	  	</tr>
  	</thead>
  	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{!! explode(' ', $user->name)[0] !!}</td>
			<td>{!! explode(' ', $user->name)[1] !!}</td>
			<td> <a href="mailto:user@example.com">{!!$user->email!!}</a></td>
			<td><a href="http://{!!$user->website!!}"">{!!$user->website!!}</a></td>
		</tr>
		@endforeach
	</tbody>
	
</table>

<script>
	$(document).ready(function() {
    	$('#table').DataTable();
	});
</script>
@stop
