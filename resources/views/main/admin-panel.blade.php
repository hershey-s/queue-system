@extends('layouts.mainlayout')
@section('title')
	Admin Panel
@stop

@section('content')
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10 well">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<h1 style="text-align: center;">ADMIN PANEL</h1>
				<br>
				<br>
				<br>
				<a href="/checkup-page" class="btn btn-danger btn-lg btn-block"><i class="fas fa-file-medical-alt"></i> Checkups</a>
				<br>
				<a href="/queue" class="btn btn-danger btn-lg btn-block"><i class="fas fa-laptop"></i> Queueing System</a>
				<br>
				<a href="/patient-list" class="btn btn-danger btn-lg btn-block"><i class="fas fa-users"></i> Patient List</a>
				<br>
				<a href="/master-record" class="btn btn-danger btn-lg btn-block"><i class="fas fa-list-alt"></i> Master List</a>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	<div class="col-sm-1"></div>
@stop