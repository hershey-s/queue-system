@extends('layouts.mainlayout')
@section('title')
	Registration Page
@stop

@section('content')
	<div class="col-sm-3"></div>

	<div class="col-sm-6 well">
		<h1 style="text-align: center;">PATIENT REGISTRATION</h1>
		<hr style="border-color: black !important;">
		<br>
		<br>
		<form class="form-horizontal" action="/register" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
			    <label for="fullname" class="col-sm-3">Full Name:</label>
			    <div class="col-sm-9">
			    	<input type="text" class="form-control" id="fullname" name="fullname">
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="birthday" class="col-sm-3">Birthday:</label>
			    <div class="col-sm-9">
			    	<input type="date" class="form-control" id="birthday" name="birthday">
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="sex" class="col-sm-3">Sex:</label>
			    <div class="col-sm-9">
			    	<select class="form-control" id="sex" name="sex">
			    		<option>Male</option>
			    		<option>Female</option>
			    	</select>
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="address" class="col-sm-3">Address:</label>
			    <div class="col-sm-9">
			    	<input type="text" class="form-control" id="address" name="address" required>
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="address" class="col-sm-3">Mobile Number:</label>
				<div class="col-sm-9">
					<div class="input-group">
					  	<span class="input-group-addon" id="noPrefix">+63</span>
					  	<input type="text" class="form-control" id="mobileNo" name="mobileNo" placeholder="e.g. 9123456789" aria-describedby="noPrefix" required>
					</div>
				</div>
		  	</div>
		  	<div class="form-group">
			    <label for="civilstatus" class="col-sm-3">Civil Status:</label>
			    <div class="col-sm-9">
			    	<select class="form-control" id="civilstatus" name="civilstatus">
			    		<option>Single</option>
			    		<option>Married</option>
			    		<option>Divorced</option>
			    	</select>
			  	</div>
		  	</div>
	        <div class="form-group">
			    <label for="fullname" class="col-sm-3">Username:</label>
			    <div class="col-sm-9">
			    	<input type="text" class="form-control" id="username" name="username" required>
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="fullname" class="col-sm-3">Password:</label>
			    <div class="col-sm-9">
			    	<input type="password" class="form-control" id="password" name="password" required>
			  	</div>
		  	</div>
		  	<!-- <div class="form-group">
	            <label for="profpic" class="col-sm-3">Upload a Photo: (Optional)</label>
	            <input class="file col-sm-9" type="file" id="profpic" name="profpic">
	        </div> -->
	        <button type="submit" class="btn btn-success btn-block" id="uploadIDs"><i class="fas fa-save"></i> Register</button>
	        <br>
	        <button type="reset" class="btn btn-danger col-sm-6"><i class="fas fa-undo-alt"></i> Reset</button>
	        <a class="btn btn-primary col-sm-6" href="/"><i class="fas fa-arrow-circle-left"></i> Back to Login</a>
		</form>
	</div>
@stop