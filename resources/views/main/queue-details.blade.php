@extends('layouts.mainlayout')

@section('content')
	@php
		$z = 0;
	@endphp
	<div class="col-sm-1"></div>

	<div class="col-sm-10 well">
		<table class="table table-hover table-bordered patient details">
			<thead>
				@if( $queue->count() == 0)
					<tr>
						<th>No Data</th>
					</tr>
				@else
					<tr>
						<th width="1">#</th>
						<th width="" class="text-center">Patient Name</th>
						<th class="text-center">Checkup Description</th>
						<th class="text-center">Doctor-In-Charge</th>
						<th class="text-center">Actions</th>
					</tr>
				@endif
			</thead>
			<tbody>
				@if( $queue->count() == 0)
					<tr>
						<td>No Data</td>
					</tr>
				@else
					@foreach($queue as $index => $q)
						@php
							$z += 1;
						@endphp

						<tr>
							<td>{{ $q->id }}</td>
							<td>{{ $q->patientName }}</td>
							<form action="/queue-details" method="post">
								{{ csrf_field() }}
								<td><input class="form-control" type="text" name="desc" value="{{ $q->checkupDescription }}">
								<input type="text" name="queueID" value="{{ $q->id }}" hidden>
								</td>
								<td><input class="form-control" type="text" name="doc" value="{{ $q->doctorInCharge }}"></td>
								<td class="text-center">
									<button class="status btn btn-success" href="javascript:void()"><i class="fas fa-save"></i> Save Details</button>
								</td>
							</form>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>

	<div class="col-sm-2"></div>
@stop