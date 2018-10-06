@extends('layouts.mainlayout')
@section('title')
	Queueing System
@stop

@php
	$x = (int)(12/count($category));
@endphp

@section('content')
	<div class="row well">

	@if(session('userType') == 'admin')

	<div class="col-sm-1">
	</div>

	<div class="col-sm-10">
		<ul class="nav nav-tabs queues">
		    @foreach($category as $c)
		    	<li class="col-sm-{{$x}} {{ ($loop->first) ? 'active' : '' }}"><a data-toggle="tab" href="#menu{{$c->checkupTypeID}}">{{ $c->categoryName }}</a></li>
			@endforeach
		</ul>

		<div class="tab-content">
			@foreach($category as $id => $c)
			@php
				$z = 0;
			@endphp
				<div id="menu{{$c->checkupTypeID}}" class="tab-pane fade {{ ($loop->first) ? 'in active' : '' }}">
					<h3>{{ $c->categoryName }}</h3>
					<table class="table table-hover table-bordered patient">
						<thead>
							<tr>
								<th width="1">#</th>
								<th>Patient Name</th>
								<th>Checkup Description</th>
								<th>Doctor-In-Charge</th>
								<th>Action</th>	
								<th>Send SMS</th>
								<th width="1">Status</th>
							</tr>
						</thead>
						<tbody>

						@if( $queue->where('checkupTypeID', $c->checkupTypeID)->count() == 0)
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td><a class="btn btn-primary btn-block">N/A</a></td>
							</tr>
						@else
							@foreach($queue->where('checkupTypeID', $c->checkupTypeID) as $index => $q)
								@php
									$z += 1;
								@endphp

								<tr>
									<td>{{ $z }}</td>
									<td>{{ $q->patientName }}</td>
									<form action="/update-queue-details" method="post">
										{{ csrf_field() }}
										<td><input class="form-control" type="text" name="desc" value="{{ $q->checkupDescription }}">
										<input type="text" name="queueID" value="{{ $q->id }}" hidden>
										</td>
										<td><input class="form-control" type="text" name="doc" value="{{ $q->doctorInCharge }}"></td>
										<td><button class="status btn btn-primary btn-block" href="javascript:void()">Save Changes</button></td>
									</form>
									<td><a href="/sendSMS?queue={{ $q->id }}&pos={{ $z }}&cat={{ $c->categoryName }}&id={{ $q->patientID }}" class="btn btn-success btn-block">Send SMS</a></td>
									<td><a href="/finish/{{$q->queueID}}" class="btn btn-warning btn-block">Finish</a></td>
								</tr>
							@endforeach
						@endif
						</tbody>
					</table>
				</div>
			@endforeach
		</div>
	</div>
	<div class="col-sm-1">
	</div>

	@else
		@foreach($category as $c)
			@php
				$z = 0;
			@endphp

			<div class="col-sm-{{$x}}">
				<h3 style="text-align: center;">{{ $c->categoryName }}</h3>
				<a href="/add-to-queue?pID={{session('id')}}&pName={{session('fullName')}}&cID={{$c->checkupTypeID}}" class="btn btn-success btn-block">Join Queue</a>
				<hr style="border-color: black !important;">
				<br>
				<table class="table table-hover table-bordered patient">
					<thead>
						<tr>
							<th width="1">#</th>
							<th>Patient Name</th>
							<th width="1">Status</th>
						</tr>
					</thead>
					<tbody>

					@if( $queue->where('checkupTypeID', $c->checkupTypeID)->count() == 0)
						<tr>
							<td></td>
							<td>No Data</td>
							<td><a class="btn btn-primary btn-block">N/A</a></td>
						</tr>
					@else
						@foreach($queue->where('checkupTypeID', $c->checkupTypeID) as $index => $q)
							@php
								$z += 1;
							@endphp

							<tr>
								<td>{{ $z }}</td>
								<td>{{ $q->patientName }}</td>
								<td><span class="status btn btn-primary btn-block" href="javascript:void()">{{ $q->queueStatus }}</span></td>
							</tr>
						@endforeach
					@endif
					</tbody>
				</table>
			</div>
		@endforeach
	@endif

		<div class="col-sm-12">
			@if(session('userType') == 'admin')
				<br>
				<form action="/compile-records" method="get">
					<button class="btn btn-primary btn-block">Add to Master Record</button>
				</form>
			@endif
		</div>

	</div>
@stop