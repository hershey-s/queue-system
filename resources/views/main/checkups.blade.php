@extends('layouts.mainlayout')
@section('title')
	Checkup Page
@stop

@section('content')
	<div class="col-sm-1"></div>
	<div class="col-sm-10 well">
		<h1 style="text-align: center;">CHECKUP PAGE</h1>
		<hr style="border-color: black !important;">
		<div class="col-sm-4">
			@foreach($category as $c)
				<h4><li>{{ $c->categoryName }}</li></h4>
			@endforeach
		</div>
		<div class="col-sm-8" style="margin-top: 10px;">
		<form class="form-horizontal" action="/checkup-page" method="post" enctype="multipart/form-data">
			<h1>Add New Category</h1>
			{{ csrf_field() }}
			<div class="form-group">
			    <label for="fullname" class="col-sm-4">Checkup Category:</label>
			    <div class="col-sm-8">
			    	<input type="text" class="form-control" id="categoryName" name="categoryName">
			  	</div>
		  	</div>
	        <button type="submit" class="btn btn-success btn-block" id="uploadIDs"><i class="fas fa-save"></i> SAVE</button>
		</form>
		</div>
	</div>
	<div class="col-sm-1"></div>
@stop