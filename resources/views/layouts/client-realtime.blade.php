@php
	$x = (int)(12/count($category));
@endphp

@foreach($category as $c)
	<div class="col-sm-{{$x}} well queueTable">
		<h3 style="text-align: center;">{{ $c->categoryName }}</h3>
		@if(session('userType') != 'admin')
			<a href="/add-to-queue?pID={{session('id')}}&pName={{$patient->fullname}}&cID={{$c->checkupTypeID}}" class="btn btn-success btn-block"><i class="fas fa-check-circle"></i> Join Queue</a>
		@endif
		
		<hr style="border-color: black !important;">
		<br>
		<div class="scroll">
			<table class="table table-hover table-bordered queue">
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
						<tr>
							<td>{{ $q->id }}</td>
							<td>{{ $q->patientName }}</td>
							<td><span class="status btn btn-primary btn-block" href="javascript:void()">On Queue</span></td>
						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
		</div>
	</div>
@endforeach