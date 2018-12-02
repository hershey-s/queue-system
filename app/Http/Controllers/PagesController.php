<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckupType;
use App\Doctor;
use App\MasterRecord;
use App\Patient;
use App\Office;
use App\Queue;
use DB;

class PagesController extends Controller
{
    public function index() {
    	return view('/main.index');
    }

    public function checkup(){
        $category = CheckupType::all();
        return view('/main.checkups', compact('category'));
    }

    public function doctors(){
        $doctors = Doctor::all();
        return view('/main.doctors', compact('doctors'));
    }

    public function login() {
        return view('/main.login');
    }

    public function master_list() {
        $master = MasterRecord::all();
        return view('/main.master-list', compact('master'));
    }

    public function patient_record() {
        $patient = Patient::where('patientID', session('id'))->first();
        $categories = CheckupType::all();
        $myRecords = MasterRecord::where('patientID', session('id'))->get();
        return view('/main.patient-records', compact('myRecords', 'categories', 'patient'));
    }

    public function edit_profile() {
        $patient = Patient::where('patientID', session('id'))->first();
        return view('/main.edit-profile', compact('patient'));
    }

    public function change_password() {
        return view('/main.change-password');
    }

    public function queue() {
        $category = CheckupType::all();
        $queue = Queue::all();
        $patient = Patient::where('PatientID', session('id'))->first();
        return view('/main.queue', compact('category', 'queue', 'patient'));
    }

    public function queue_details() {
        $activeTab = 1;
        $category = CheckupType::all();
        $queue = Queue::all();
        $doctors = Doctor::all();
        $patient = Patient::where('PatientID', session('id'))->first();
        return view('/main.queue-details', compact('category', 'queue', 'doctors', 'patient', 'activeTab'));
    }

    public function realtime_queue(Request $r) {
        $activeTab = $r->activeTab;
        $category = CheckupType::all();
        $queue = Queue::all();
        $doctors = Doctor::all();
        $patient = Patient::where('PatientID', session('id'))->first();
        return view('/layouts.realtime', compact('category', 'queue', 'doctors', 'patient', 'activeTab'));
    }

    public function client_realtime() {
        // return 1;
        $category = CheckupType::all();
        $queue = Queue::all();
        $doctors = Doctor::all();
        $patient = Patient::where('PatientID', session('id'))->first();
        return view('/layouts.client-realtime', compact('category', 'queue', 'doctors', 'patient', 'activeTab'));
    }

    public function admin() {
        $status = Office::where('id', 1)->first();
        return view('/main.admin-panel', compact('status'));
    }

    public function status(Request $r) {
        $status = Office::where('id', 1)->first();
        if($status->status_1 == 'Open') {
            DB::table('offices')->where('id', 1)->update(['status_1' => 'Closed']);
            DB::table('queues')->truncate();
            return redirect('/admin-panel');
        }
        else {
            DB::table('offices')->where('id', 1)->update(['status_1' => 'Open']);
            return redirect('/admin-panel');
        }
        
    }

    public function register() {
    	return view('/main.register');
    }
}
