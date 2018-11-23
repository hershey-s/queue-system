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
        $tempID = Queue::where('checkupTypeID', $r->cID)->get();
    	$q->queueID = count($tempID) + 1;
    	$q->patientID = $r->pID;
    	$q->patientName = $r->pName;
    	$q->queueStatus = 'On Queue';
		$q->doctorInCharge = '';//$r->doctor;
		$q->checkupTypeID = $r->cID;
		$q->checkupDescription = '';//$r->description;
		$q->save();
		return back();
    }

    public function cancel($item) {
        DB::select('DELETE FROM queues WHERE id = '.$item);
        return redirect('/queue');
    }

    public function sendSMS(Request $r) {
        $p = Patient::where('patientID', $r->id)->first();
        $no = $p->mobileNo;
        $mes = '#' .$r->num.', you are in position '.$r->pos;
        // iText($no, $mes);
        sendSMS($no, $mes);
        return back();
    }

    public function update_queue(Request $r) {
        DB::table('queues')->where('id', $r->queueID)->update(['checkupDescription' => $r->desc, 'doctorInCharge' => $r->doc]);
        return back();
    }
}