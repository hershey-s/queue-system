@extends('layouts.mainlayout')
@section('title')
	Master Record
@stop

@section('content')
	<div class="col-sm-12 well">
		<h1 style="text-align: center;">MASTER RECORD</h1>
		<hr style="border-color: black !important;">
		<br>
		<br>
		<table class="table table-hover table-bordered patient">
			<thead>
				<tr>
					<td>Patient Name</td>
					<td>Time Finished</td>
					<td>Doctor In Charge</td>
					<td>Checkup Name</td>
					<td>Checkup Date</td>
				</tr>
			</thead>
			<tbody>
				@foreach($master as $m)
				<tr>
					<td>{{ $m->patientName }}</td>
					<td>{{ $m->timeFinished }}</td>
					<td>{{ $m->doctorInCharge }}</td>
					<td>{{ $m->checkupDescription }}</td>
					<td>{{ $m->checkupDate }} </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop