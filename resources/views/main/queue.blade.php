@extends('layouts.mainlayout')
@section('title')
	Queueing System
@stop

@section('nav-pane')
	<a href="/" class="btn btn-warning btn-block">Back to Landing Page</a>
@stop

@section('content')
	<div class="col-sm-12 well">
		<h1 style="text-align: center;">QUEUEING SYSTEM</h1>
		<hr style="border-color: black !important;">
		<br>
		<br>
		<button class="checkup-sort btn btn-danger col-sm-4">General Checkup</button>	
		<button class="checkup-sort btn btn-default col-sm-4">Pregnancy Checkup</button>
		<button class="checkup-sort btn btn-default col-sm-4">Vaccines</button>
		<br>
		<br>
		<br>
		<table class="table table-hover table-bordered patient">
			<thead>
				<tr>
					<td width="1">Number</td>
					<td>Availability</td>
					<td width="1">Action</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Not Available</td>
					<td><button class="btn btn-danger btn-block" disabled="disabled">Get</button></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Available</td>
					<td><button class="btn btn-danger btn-block">Get</button></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Not Available</td>
					<td><button class="btn btn-danger btn-block" disabled="disabled">Get</button></td>
				</tr>
				<tr>
					<td>4</td>
					<td>Not Available</td>
					<td><button class="btn btn-danger btn-block" disabled="disabled">Get</button></td>
				</tr>
				<tr>
					<td>5</td>
					<td>Not Available</td>
					<td><button class="btn btn-danger btn-block" disabled="disabled">Get</button></td>
				</tr>
				<tr>
					<td>6</td>
					<td>Available</td>
					<td><button class="btn btn-danger btn-block">Get</button></td>
				</tr>
			</tbody>
		</table>
	</div>
@stop