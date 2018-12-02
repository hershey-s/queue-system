@php
	$x = (int)(12/count($category));
@endphp

	<div class="tab-content">
		@foreach($category as $id => $c)
		@php
			$z = 0;
		@endphp
			<div id="menu{{$c->checkupTypeID}}" class="tab-pane fade {{ ($c->checkupTypeID == $activeTab) ? 'in active' : '' }}">
				<h3>{{ $c->categoryName }}</h3>
				<table class="table table-hover table-bordered queue">
					<thead>
						@if( $queue->where('checkupTypeID', $c->checkupTypeID)->count() == 0)
							<tr>
								<th>No Data</th>
							</tr>
						@else
							<tr>
								<th width="1">#</th>
								<th class="text-center">Patient Name</th>
								<th>Doctor In Charge</th>
								<th>Checkup Name</th>
								<th class="text-center">Actions</th>
							</tr>
						@endif
					</thead>
					<tbody>
						@if( $queue->where('checkupTypeID', $c->checkupTypeID)->count() == 0)
							<tr>
								<td>No Data</td>
							</tr>
						@else
							@foreach($queue->where('checkupTypeID', $c->checkupTypeID) as $index => $q)
								@php
									$z += 1;
								@endphp

								<tr>
									<td>{{ $q->id }}</td>
									<td>{{ $q->patientName }}</td>
									<td>{{ $q->doctorInCharge }}</td>
									<td>{{ $q->checkupDescription }}</td>
									<td>
										<!-- <div class="btn-group"> -->
										<a title="SMS" href="/sendSMS?queue={{ $q->id }}&pos={{ $z }}&num={{ $q->id }}&id={{ $q->patientID }}" class="actions btn btn-primary"><i class="fas fa-envelope"></i></a>
										<button title="Edit" class="edit-queue actions btn btn-warning" data-toggle="modal" data-target="#editModal" data-data="{{ $q }}"><i class="fas fa-edit"></i></button>
								    	<a title="Finish" href="/finish/{{$q->id}}" class="actions btn btn-success"><i class="fas fa-user-check"></i></a>
								    	<a title="cancel" href="/cancel/{{$q->id}}" class="actions btn btn-danger"><i class="fas fa-user-times"></i></a>
								    	<!-- </div> -->
									</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		@endforeach
	</div>
