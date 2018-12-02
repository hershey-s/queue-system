@extends('layouts.mainlayout')
@section('title')
	Master Record
@stop

@section('content')
	<div class="col-sm-1"></div>
	<div class="col-sm-10 well">
		<h1 style="text-align: center;">MASTER RECORD</h1>
		<hr style="border-color: black !important;">
		<br>
		<br>
		<table class="table table-hover table-bordered patient">
			<thead>
				<tr>
					<th>Patient Name</th>
					<th>Doctor In Charge</th>
					<th>Checkup Name</th>
					<th>Checkup Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($master as $m)
				<tr>
					<td>{{ $m->patientName }}</td>
					<td>{{ $m->doctorInCharge }}</td>
					<td>{{ $m->checkupDescription }}</td>
					<td>{{ $m->checkupDate }} </td>
					<td>
						<button class="edit-master btn btn-warning" data-toggle="modal" data-target="#editModal" data-data="{{ $m }}"><i class="fas fa-edit"></i> Edit</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
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
                <form method="post" action="/master-record" id="edit-form">
                    {{ csrf_field() }}
                    <input type="hidden" id="updateID" name="updateID" class="form-control">
                    <div class="form-group form-float">
                        <div class="form-line">
                        	<label class="form-label">Patient Name</label>
                            <input type="text" id="edit-name" name="editName" class="form-control" required>
                           
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                        	<label class="form-label">Doctor</label>
                            <input type="text" id="edit-doc" name="editDoc" class="form-control" required>
                            
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                        	<label class="form-label">Checkup</label>
                            <input type="text" id="edit-checkup" name="editCheckup" class="form-control" required>
                            
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                        	<label class="form-label">Date</label>
                            <input type="text" id="edit-date" name="editDate" class="form-control" required>
                            
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