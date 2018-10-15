@extends('layouts.mainlayout')
@section('title')
	Queueing System
@stop

@section('content')
<div class="row">
	<div class="col-sm-3"></div>

	<div class="col-sm-6 well">
		<div class="row">
			<img src="/images/brand/logo.png" class="center-img">
			<h1 style="text-align: center;">WELCOME! PLEASE LOGIN</h1>
			<hr style="border-color: black !important;">
			<br>
			<br>
		</div>
		@if($errors->any())
			<div class="alert alert-danger alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>{{$errors->first()}}!</strong> Try again.
		    </div>
	    @endif

		<form class="form-horizontal" action="/" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
			    <label for="fullname" class="col-sm-3">Username:</label>
			    <div class="col-sm-9">
			    	<input type="text" class="form-control" id="username" name="username">
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="fullname" class="col-sm-3">Password:</label>
			    <div class="col-sm-9	">
			    	<input type="password" class="form-control" id="password" name="password">
			  	</div>
		  	</div>
	        <button type="submit" class="btn btn-success btn-block" id="uploadIDs"><i class="fas fa-sign-in-alt"></i> Login</button>
		</form>
		<br>
		<a href="/register" class="btn btn-danger btn-block"><i class="fas fa-user-plus"></i> Create an Account</a>
	</div>
</div>
@stop