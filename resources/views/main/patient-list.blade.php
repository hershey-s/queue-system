@extends('layouts.mainlayout')
@section('title')
	Queueing System
@stop

@section('nav-pane')
	<a href="/" class="btn btn-warning btn-block">Back to Landing Page</a>
@stop

@section('content')
	<div class="col-sm-12 well">
		<h1 style="text-align: center;">PATIENT LIST</h1>
		<hr style="border-color: black !important;">
		<br>
		<table class="table table-hover table-bordered patient">
			<thead>
				<tr>
					<td>Full Name</td>
					<td>Birthday</td>
					<td>Sex</td>
					<td>Address</td>
					<td>Civil Status</td>
				</tr>
			</thead>
			<tbody>
				<tr>
				@foreach($patients as $p)
					<td>{{ $p->fullname }}</td>
					<td>{{ $p->birthday }}</td>
					<td>{{ $p->sex }}</td>
					<td>{{ $p->address }}</td>
					<td>{{ $p->civilstatus }}</td>
				@endforeach
				</tr>
			</tbody>
		</table>
	</div>
@stop