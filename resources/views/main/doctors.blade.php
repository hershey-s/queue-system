@extends('layouts.mainlayout')
@section('title')
	Doctors List
@stop

@section('content')
	<div class="col-sm-12 well">
		<h1 style="text-align: center;">DOCTORS LIST</h1>
		<hr style="border-color: black !important;">
		<br>
		<br>
		<table class="table table-hover table-bordered patient">
			<thead>
				<tr>
					<td>Full Name</td>
					<td>Expertise</td>
					<td>Sex</td>
				</tr>
			</thead>
			<tbody>
				@foreach($doctors as $dr)
				<tr>
					<td>{{ $dr->doctorName }}</td>
					<td>{{ $dr->expertise }}</td>
					<td>{{ $dr->sex }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop