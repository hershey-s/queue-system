<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queue;
use App\MasterRecord;
use Carbon\Carbon;
use DB;

class MasterRecordController extends Controller
{
    public function compile() {
    	$queue = Queue::where('queueStatus', 'Finished')->get();
    	$count = count($queue);
    	$b = array();
    	foreach($queue as $q) {
    		$m = new MasterRecord;
    		$m->patientID = $q->patientID;
    		$m->patientName = $q->patientName;
    		$m->queueStatus = $m->queueStatus;
    		$m->timeFinished = $q->timeFinished;
    		$m->doctorInCharge = $q->doctorInCharge;
    		$m->checkupTypeID = $q->checkupTypeID;
    		$m->checkupDescription = $q->checkupDescription;
    		$m->checkupDate = $q->created_at->toDateString();
    		$m->save();
    	}

    	DB::select('DELETE FROM queues');

    	return redirect('/master-record');	
    }
}