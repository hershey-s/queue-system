@extends('layouts.mainlayout')
@section('title')
	Queueing System
@stop

@php
	$x = (int)(12/count($category));
@endphp

@section('content')
	<div class="row">

	@if(session('userType') == 'admin')

	<div class="col-sm-2">
	</div>

	<div>
		<div class="col-sm-8 well">
			<ul class="nav nav-tabs queues">
			    @foreach($category as $c)
			    	<li data-id="{{$c->checkupTypeID}}" class="realtab col-sm-{{$x}} {{ ($loop->first) ? 'active' : '' }}"><a data-toggle="tab" href="#menu{{$c->checkupTypeID}}">{{ $c->categoryName }}</a></li>
				@endforeach
			</ul>
			<div class="ult">
				@include('layouts.realtime')
			</div>
		</div>
	</div>
	
	<div class="col-sm-2">
	</div>

	@else
		@foreach($category as $c)
			@php
				$z = 0;
			@endphp

			<div class="col-sm-{{$x}} well queue">
				<h3 style="text-align: center;">{{ $c->categoryName }}</h3>
				<a href="/add-to-queue?pID={{session('id')}}&pName={{session('fullName')}}&cID={{$c->checkupTypeID}}" class="btn btn-success btn-block"><i class="fas fa-check-circle"></i> Join Queue</a>
				<hr style="border-color: black !important;">
				<br>
				<div class="scroll">
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
									<td>{{ $q->id }}</td>
									<td>{{ $q->patientName }}</td>
									<td><span class="status btn btn-primary btn-block" href="javascript:void()">{{ $q->queueStatus }}</span></td>
								</tr>
							@endforeach
						@endif
						</tbody>
					</table>
				</div>
			</div>
		@endforeach
	@endif

		<!-- <div class="col-sm-12">
			@if(session('userType') == 'admin')
				<br>
				<form action="/compile-records" method="get">
					<button class="btn btn-primary btn-block">Add to Master Record</button>
				</form>
			@endif
		</div> -->

	</div>
@stop