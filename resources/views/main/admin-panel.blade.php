@extends('layouts.mainlayout')
@section('title')
	Admin Panel
@stop

@section('content')
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10 well">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<h1 style="text-align: center;">ADMIN PANEL</h1>
				<br>
				<br>
				<form method="post" action="/admin-panel">
					{{ csrf_field() }}
					<div class="input-group office-status">
					  	<span class="input-group-addon" id="noPrefix" style="font-size: 18px;">The clinic is:</span>
						<input type="text" class="form-control input-lg {{ ($status->status_1 == 'Open') ? 'opened' : 'closed' }}" value="{{ $status->status_1 }}" readonly>
						<span class="input-group-btn">
					        <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#opStatus"><i class="fas fa-save"></i> Update</button>
					    </span>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="opStatus" tabindex="-1" role="dialog" aria-labelledby="opStatusLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="opStatusLabel">Warning!</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body">
									@if($status->status_1 == 'Open')
										Closing the clinic will delete remaining records in the queue. Continue?
									@else
										Are yous sure to open the clinic?
									@endif
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button class="btn btn-{{ ($status->status_1 == 'Open') ? 'danger' : 'success' }}" type="submit"><i class="fas fa-save"></i> Yes</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<br>
				<a href="/checkup-page" class="btn btn-danger btn-lg btn-block"><i class="fas fa-file-medical-alt"></i> Checkups</a>
				<br>
				<div class="btn-group btn-group-justified">
					<a href="/queue" class="btn btn-danger btn-lg btn-block"><i class="fas fa-laptop"></i> Queueing System</a>
					<a href="/queue-details" class="btn btn-danger btn-lg btn-block"><i class="fas fa-info-circle"></i> Queue Details</a>
				</div>
				<br>
				<a href="/patient-list" class="btn btn-danger btn-lg btn-block"><i class="fas fa-users"></i> Patient List</a>
				<br>
				<a href="/master-record" class="btn btn-danger btn-lg btn-block"><i class="fas fa-list-alt"></i> Master Record</a>
				<br>
				<a href="/register" class="btn btn-danger btn-lg btn-block"><i class="fas fa-user-plus"></i> Register New Patient</a>
				<br>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
	<div class="col-sm-1"></div>
@stop