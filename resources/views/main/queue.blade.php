@extends('layouts.mainlayout')
@section('title')
	Queueing System
@stop

@section('content')
	<div class="row well">
		@foreach($category as $c)
		@php
			$x = (int)(12/count($category));
			$z = 0;
		@endphp
			<div class="col-sm-{{$x}}">
				<h3 style="text-align: center;">{{ $c->categoryName }}</h3>
				<hr style="border-color: black !important;">
				<br>
				<table class="table table-hover table-bordered patient">
					<thead>
						<tr>
							<th width="1">#</th>
							<th>Patient Name</th>
							<th width="1">Status</th>
							@if(session('userType') == 'admin')
								<th>Action</th>	
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach($queue->where('checkupTypeID', $c->checkupTypeID) as $index => $q)
						@php
							$z += 1;
						@endphp
						<tr>
							<td>{{ $z }}</td>
							<td>{{ $q->patientName }}</td>
							<td><span class="status btn btn-primary btn-block" href="javascript:void()">{{ $q->queueStatus }}</span></td>
							@if(session('userType') == 'admin')
								<td><a href="/update-status/{{$q->patientID}}" class="btn btn-warning btn-block">Update Status</a></td>
							@endif
							@endforeach
						</tr>
						
					</tbody>
				</table>
			</div>
		@endforeach
		<div class="col-sm-12">
			@if(session('userType') == 'admin')
			@else
				<button class="btn btn-success btn-block" id="btnQueue" data-toggle="modal" data-target="#queueModal">Join Queue</button>
			@endif

			@if(session('userType') == 'admin')
				<br>
				<form action="/compile-records" method="get">
					<button class="btn btn-primary btn-block">Add to Master Record</button>
				</form>
			@endif
		</div>

		<div class="modal fade" id="queueModal" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Join a Queue</h3>
					</div>
					<div class="modal-body">
						<form action="/queue" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<label>Patient</label>
								<input type="text" class="form-control" name="patientName" readonly="" value="{{ $patient->fullname }}">
								<input type="text" name="patientID" value="{{ $patient->patientID }}" hidden>
							</div>
							<div class="form-group">
								<label>Checkup Type</label>
								<select class="form-control" name="category">
									<option>Choose one.</option>
									@foreach($category as $key => $c)
										<option value="{{ $c->checkupTypeID }} ">{{ $c->categoryName }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Checkup Description</label>
								<input type="text" name="description" class="form-control">
							</div>
							<div class="form-group">
								<label>Doctor</label>
								<input type="text" name="doctor" class="form-control">
								<!-- <select class="form-control" name="doctor">
									<option>Choose one.</option>
									@foreach($doctors as $key => $dr)
										<option> {{ $dr->doctorName }}</option>
									@endforeach
								</select> -->
							</div>
							<button type="submit" class="btn btn-success btn-block">Submit</button>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop