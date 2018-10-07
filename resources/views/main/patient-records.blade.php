@extends('layouts.mainlayout')
@section('title')
	My Records
@stop

@section('content')
	<div class="col-sm-3 well profile">
		<div class="col-sm-12">
			<h2>{{ session('fullName') }}</h2>
			<hr style="border-color: black !important;">
			<h5>{{ session('bday') }}</h5>
			<h5>{{ session('sex') }}</h5>
			<h5>{{ session('address') }}</h5>
			<h6>&nbsp;</h6>
			<a href="/queue" class="btn btn-success btn-block">Join a Queue</a>
		</div>
		<h6>&nbsp;</h6>
	</div>

	<div class="col-sm-9 well">
		<h2 style="text-align: center;">MY RECORDS</h2>
		<hr style="border-color: black !important;">
		<br>
		<br>
		
		<ul class="nav nav-tabs records">
		    <li class="active ct"><a data-toggle="tab" href="#home">All Records</a></li>
		    @foreach($categories as $type)
		    	<li><a data-toggle="tab" href="#menu{{$type->checkupTypeID}}">{{ $type->categoryName }}</a></li>
			@endforeach
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<h3>All records</h3>
				<table class="table table-hovered myRecord">
					<thead>
						<tr>
							<th>Checkup Category</th>
							<th>Checkup Description</th>
							<th>Date</th>
							<th>Doctor</th>
						</tr>
					</thead>
					<tbody>
						@foreach($myRecords as $mr)
						<tr>
							<td>{{ $type->where('checkupTypeID', $mr->checkupTypeID)->first()->categoryName	 }}</td>
							<td>{{ $mr->checkupDescription }}</td>
							<td>{{ $mr->doctorInCharge }}</td>
							<td>{{ $mr->checkupDate }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@foreach($categories as $id => $type)
				<div id="menu{{$type->checkupTypeID}}" class="tab-pane fade">
					<h3>{{ $type->categoryName }}</h3>
					<table class="table table-hovered myRecord">
						<thead>
							<tr>
								<th>Checkup Category</th>
								<th>Checkup Description</th>
								<th>Date</th>
								<th>Doctor</th>
							</tr>
						</thead>
						<tbody>
							@foreach($myRecords->where('checkupTypeID', $type->checkupTypeID) as $mr)
							<tr>
								<td>{{ $type->categoryName }}</td>
								<td>{{ $mr->checkupDescription }}</td>
								<td>{{ $mr->doctorInCharge }}</td>
								<td>{{ $mr->checkupDate }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@endforeach
		</div>
	</div>
@stop