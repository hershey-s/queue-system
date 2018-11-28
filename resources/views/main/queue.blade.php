@extends('layouts.mainlayout')
@section('title')
	Queueing System
@stop

@php
	$x = (int)(12/count($category));
@endphp

@section('content')
	<div class="row">

	@if(session('userType') == 'admin')

	<div class="col-sm-2">
	</div>

	<div>
		<div class="col-sm-8 well">
			<ul class="nav nav-tabs queues">
			    @foreach($category as $c)
			    	<li data-id="{{$c->checkupTypeID}}" class="realtab col-sm-{{$x}} {{ ($loop->first) ? 'active' : '' }}"><a data-toggle="tab" href="#menu{{$c->checkupTypeID}}">{{ $c->categoryName }}</a></li>
				@endforeach
			</ul>
			<div class="ult">
				@include('layouts.realtime')
			</div>
		</div>
	</div>
	
	<div class="col-sm-2">
	</div>

	@else
		<div class="client">
			@include('layouts.client-realtime')
		</div>
	@endif

		<!-- <div class="col-sm-12">
			@if(session('userType') == 'admin')
				<br>
				<form action="/compile-records" method="get">
					<button class="btn btn-primary btn-block">Add to Master Record</button>
				</form>
			@endif
		</div> -->

	</div>
@stop