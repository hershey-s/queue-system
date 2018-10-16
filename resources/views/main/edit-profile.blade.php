@extends('layouts.mainlayout')
@section('title')
	Change Password
@stop

@section('content')
	<div class="col-sm-1"></div>
	<div class="col-sm-10 well">
		<h1 style="text-align: center;">Edit Profile</h1>
		<hr style="border-color: black !important;">
		<form class="form-horizontal" action="/edit-profile" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="text" name="up_id" value="{{ $patient->patientID }}" hidden>
			<div class="form-group">
			    <label for="up_name" class="col-sm-3">Full Name:</label>
			    <div class="col-sm-9">
			    	<input type="text" class="form-control" id="up_name" name="up_name" value="{{ $patient->fullname }}">
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="up_bday" class="col-sm-3">Birthday:</label>
			    <div class="col-sm-9">
			    	<input type="date" class="form-control" id="up_bday" name="up_bday" value="{{ $patient->birthday }}">
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="up_sex" class="col-sm-3">Sex:</label>
			    <div class="col-sm-9">
			    	<select class="form-control" id="up_sex" name="up_sex">
			    		<option>Male</option>
			    		<option>Female</option>
			    	</select>
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="up_address" class="col-sm-3">Address:</label>
			    <div class="col-sm-9">
			    	<input type="text" class="form-control" id="up_address" name="up_address" value="{{ $patient->address }}">
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="up_mobile" class="col-sm-3">Mobile Number:</label>
			    <div class="col-sm-3">
			    	<input type="text" class="form-control" readonly value="      +63      ">
			  	</div>
			  	<div class="col-sm-6">
			    	<input type="text" class="form-control" id="up_mobile" name="up_mobile" placeholder="e.g. 9123456789" value="{{ $patient->mobileNo }}">
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="up_civil" class="col-sm-3">Civil Status:</label>
			    <div class="col-sm-9">
			    	<select class="form-control" id="up_civil" name="up_civil">
			    		<option>Single</option>
			    		<option>Married</option>
			    		<option>Divorced</option>
			    	</select>
			  	</div>
		  	</div>
	        <button type="submit" class="btn btn-success col-sm-5" id="up_profile"><i class="fas fa-save"></i> Change Password</button>
	        <i class="col-sm-2"></i>
	        <a class="btn btn-danger col-sm-5" href="{{ session('userType') == 'admin' ? '/admin-panel' : '/patient-records' }}"><i class="fas fa-undo-alt"></i> Back to Profile</a>
		</form>
	</div>
	<div class="col-sm-1"></div>
@stop