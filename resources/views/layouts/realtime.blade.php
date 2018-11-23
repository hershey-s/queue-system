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
									<td>
										<a href="/sendSMS?queue={{ $q->id }}&pos={{ $z }}&num={{ $q->id }}&id={{ $q->patientID }}" class="btn btn-primary"><i class="fas fa-envelope"></i> Send</a>
								    	<a href="/finish/{{$q->id}}" class="btn btn-success"><i class="fas fa-user-check"></i> Finish</a>
								    	<a href="/cancel/{{$q->id}}" class="btn btn-danger"><i class="fas fa-user-times"></i> Cancel</a>
									</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		@endforeach
	</div>
