@extends('layouts.mainlayout')
@section('title')
	Login Page
@stop

@section('nav-pane')
	<a href="/" class="btn btn-warning btn-block">Back to Landing Page</a>
@stop

@section('content')
	<div class="col-sm-12 well">
		<h1 style="text-align: center;">LOGIN PAGE</h1>
		<hr style="border-color: black !important;">
		<br>
		<br>
		<form class="form-horizontal" action="/register" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
			    <label for="fullname" class="col-sm-3">Username:</label>
			    <div class="col-sm-9">
			    	<input type="text" class="form-control" id="fullname" name="fullname">
			  	</div>
		  	</div>
		  	<div class="form-group">
			    <label for="fullname" class="col-sm-3">Password:</label>
			    <div class="col-sm-9	">
			    	<input type="password" class="form-control" id="fullname" name="fullname">
			  	</div>
		  	</div>
	        <button type="button" class="btn btn-success btn-block" id="uploadIDs">Login</button>
		</form>
	</div>
@stop