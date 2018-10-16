@extends('layouts.mainlayout')
@section('title')
	Change Password
@stop

@section('content')
	<div class="col-sm-1"></div>
	<div class="col-sm-10 well">
		<h1 style="text-align: center;">Change Password</h1>
		<hr style="border-color: black !important;">
		@if(!empty($errMsg))
			<div class="alert alert-{{ $class }} alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>{{ $errMsg }}</strong>
		    </div>
	    @endif
		<form class="form-horizontal" action="/change-password" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="text" name="up_id" value=" patientID }}" hidden>
			<div class="form-group">
			    <label for="ch_pass" class="col-sm-3">New Password:</label>
			    <div class="col-sm-9">
			    	<input type="password" class="form-control" id="ch_pass" name="ch_pass">
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="re_pass" class="col-sm-3">Confirm Password: </label>
			    <div class="col-sm-9">
			    	<input type="password" class="form-control" id="re_pass" name="re_pass">
			  	</div>
		  	</div>
	        <button type="submit" class="btn btn-success col-sm-5" id="up_profile"><i class="fas fa-save"></i> Change Password</button>
	        <i class="col-sm-2"></i>
	        <a class="btn btn-danger col-sm-5" href=" session('userType') == 'admin' ? '/admin-panel' : '/patient-records' }}"><i class="fas fa-undo-alt"></i> Back to Profile</a>
		</form>
	</div>
	<div class="col-sm-1"></div>
@stop