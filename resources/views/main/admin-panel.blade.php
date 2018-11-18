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
				<br>
				<form method="post" action="/admin-panel">
					{{ csrf_field() }}
					<div class="input-group office-status">
					  	<span class="input-group-addon" id="noPrefix" style="font-size: 18px;">The clinic is:</span>
					  	<select id="officeStatus" name="officeStatus" class="form-control input-lg {{ ($status->status_1 == 'Open') ? 'opened' : 'closed' }}">
							<option selected>{{ $status->status_1 }}</option>
							@if($status->status_1 == 'Open')
								<option value="Closed">Closed</option>
							@else
								<option value="Open">Open</option>
							@endif
						</select>
						<span class="input-group-btn">
					        <button class="btn btn-danger btn-lg" type="submit"><i class="fas fa-save"></i> Update</button>
					    </span>
					</div>
				</form>
				<br>
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
				<a href="/master-record" class="btn btn-danger btn-lg btn-block"><i class="fas fa-list-alt"></i> Master List</a>
				<br>
				<a href="/register" class="btn btn-danger btn-lg btn-block"><i class="fas fa-user-plus"></i> Register New Patient</a>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
	<div class="col-sm-1"></div>
@stop