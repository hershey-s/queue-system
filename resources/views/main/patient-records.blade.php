@extends('layouts.mainlayout')
@section('title')
	Queueing System
@stop

@section('nav-pane')
	<a href="/" class="btn btn-warning btn-block">Back to Landing Page</a>
	<br>
	<div class="container well">
		<br>
		<div class="col-sm-12">
			<img src="/images/prof_img/sample.png" class="col-sm-12">
		</div>
		<h6>&nbsp;</h1>
		<h3>Juan Dela Cruz</h3>
		<h4>January 1, 1990</h4>
		<h4>Male</h4>
		<h4>Bgry, City, Province, PH</h4>
		<h4>Single</h4>
	</div>
@stop

@section('content')
	<div class="col-sm-12 well">
		<h1 style="text-align: center;">PATIENT RECORDS</h1>
		<hr style="border-color: black !important;">
		<br>
		<br>
		<button class="checkup-sort btn btn-danger col-sm-6">All Records</button>	
		<button class="checkup-sort btn btn-default col-sm-6">By Category</button>
		<br>
		<br>
		<br>
		<table class="table table-hover table-bordered patient">
			<thead>
				<tr>
					<td>Checkup Type</td>
					<td>Condition</td>
					<td>Date</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>General Checkup</td>
					<td>Stomach Ache</td>
					<td>February 21, 2018</td>
				</tr>
				<tr>
					<td>General Checkup</td>
					<td>Head Ache</td>
					<td>July 17, 2018</td>
				</tr>
				<tr>
					<td>General Checkup</td>
					<td>Common Colds</td>
					<td>September 3, 2018</td>
				</tr>
				<tr>
					<td>Vaccines</td>
					<td>Anti-Rabbies</td>
					<td>December 1, 2018</td>
				</tr>
			</tbody>
		</table>
	</div>
@stop