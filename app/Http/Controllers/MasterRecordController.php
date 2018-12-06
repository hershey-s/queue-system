<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queue;
use App\Patient;
use App\MasterRecord;
use Carbon\Carbon;
use DB;

class MasterRecordController extends Controller
{
    public function master_update(Request $r) {
        DB::table('master_records')->where('masterID', $r->updateID)->update(['patientName' => $r->editName, 'doctorInCharge' => $r->editDoc, 'checkupDescription' => $r->editCheckup, 'checkupDate' => $r->editDate]);
        return back();
    }

    public function finish($item) {
        $q = Queue::where('id', $item)->first();
        $m = new MasterRecord;
        $m->patientID = $q->patientID;
        $m->patientName = $q->patientName;
        //$m->queueStatus = 'Finished';
        $m->doctorInCharge = $q->doctorInCharge;
        $m->checkupTypeID = $q->checkupTypeID;
        $m->checkupDescription = $q->checkupDescription;
        $m->checkupDate = $q->created_at->toDateString();
        $m->save();
        DB::select('DELETE FROM queues WHERE id ='.$item);
        return back();
    }
}