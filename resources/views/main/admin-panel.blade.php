@extends('layouts.mainlayout')
@section('title')
	Admin Panel
@stop

@section('content')
	<div class="row">
		<div class="col-sm-3">	
		</div>

		<div class="col-sm-6 well">
			<h1 style="text-align: center;">ADMIN PANEL</h1>
			<br>
			<br>
			<br>
			<a href="/checkup-page" class="btn btn-danger btn-lg btn-block">Checkups</a>
			<br>
			<a href="/queue" class="btn btn-danger btn-lg btn-block">Queueing System</a>
			<br>
			<a href="/patient-list" class="btn btn-danger btn-lg btn-block">Patient List</a>
			<br>
			<a href="/master-record" class="btn btn-danger btn-lg btn-block">Master List</a>
		</div>
	</div>
@stop