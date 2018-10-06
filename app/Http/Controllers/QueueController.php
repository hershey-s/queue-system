<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckupType;
use App\Patient;
use App\Queue;
use DB;

class QueueController extends Controller
{

    public function add_queue(Request $r){
        $q = new Queue;
        $p = new Patient;
    	$category = $r->category;
        $tempID = Queue::where('checkupTypeID', $r->category)->get();
    	$q->queueID = count($tempID) + 1;
    	$q->patientID = $r->patientID;
    	$q->patientName = $r->patientName;
    	$q->queueStatus = 'Ongoing';
		$q->doctorInCharge = $r->doctor;
		$q->checkupTypeID = $r->category;
		$q->checkupDescription = $r->description;
		$q->save();
		return redirect('/queue');
    }

    public function update($item) {
        $p = Patient::where('patientID', $item)->get();
        DB::table('queues')->where('queueID', $item)->update(['queueStatus' => 'Finished']);
        return redirect('/queue');
    }

    public function sendSMS(Request $r) {
        $p = Patient::where('patientID', $r->id)->first();
        $no = $p->mobileNo;
        $mes = 'You are now number ' .$r->pos.' in the queue for '.$r->cat;
        iText($no, $mes);
        return back();
    }
}