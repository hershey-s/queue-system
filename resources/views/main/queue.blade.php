@extends('layouts.mainlayout')
@section('title')
	Queueing System
@stop



@section('content')
	<div class="row">
		<div class="client">
			@include('layouts.client-realtime')
		</div>
	</div>
@stop