@extends('layouts.mainlayout')

@section('title')
	Queue Details
@stop

@section('content')
	@php
		$z = 0;
		$x = (int)(12/count($category));
	@endphp

	<div class="col-sm-1"></div>

	<div>
		<div class="col-sm-10 well">
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
	
	<div class="col-sm-1"></div>

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Record</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="/queue-details" id="edit-form">
                        {{ csrf_field() }}
                        <input type="hidden" id="updateID" name="updateID" class="form-control">
                        <div class="form-group form-float">
                            <div class="form-line">
                            	<label class="form-label">Patient Name</label>
                                <input type="text" id="edit-name" name="editName" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                            	<label class="form-label">Doctor</label>
                                <input type="text" id="edit-doc" name="doc" class="form-control">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                            	<label class="form-label">Checkup</label>
                                <input type="text" id="edit-checkup" name="desc" class="form-control">
                            </div>
                        </div>
                	</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop