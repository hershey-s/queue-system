@extends('layouts.mainlayout')
@section('title')
	Patients' List
@stop

@section('content')
	<div class="col-sm-1"></div>
	<div class="col-sm-10 well">
		<h1 style="text-align: center;">PATIENT LIST</h1>
		<hr style="border-color: black !important;">
		<br>
		<br>
		<table class="table table-hover table-bordered patient">
			<thead>
				<tr>
					<th>ID</th>
					<th>Full Name</th>
					<th>Birthday</th>
					<th>Sex</th>
					<th>Address</th>
					<th>Mobile Number</th>
					<th>Civil Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($patients as $p)
				<tr>
					<td>{{ $p->patientID }}</td>
					<td>{{ $p->fullname }}</td>
					<td>{{ $p->birthday }}</td>
					<td><i class="fas fa-{{ $p->sex == 'Male' ? 'mars' : 'venus' }}"></i> {{ $p->sex }}</td>
					<td>{{ $p->address }}</td>
					<td>0{{ $p->mobileNo }}</td>
					<td>{{ $p->civilstatus }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-sm-1"></div>
@stop