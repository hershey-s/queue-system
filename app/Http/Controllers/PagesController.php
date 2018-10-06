<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckupType;
use App\Doctor;
use App\MasterRecord;
use App\Patient;
use App\Queue;

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
        $categories = CheckupType::all();
        $myRecords = MasterRecord::where('patientID', session('id'))->get();
        return view('/main.patient-records', compact('myRecords', 'categories'));
    }

    public function queue() {
        $category = CheckupType::all();
        $queue = Queue::where('queueStatus', 'Ongoing')->get();
        $doctors = Doctor::all();
        $patient = Patient::where('PatientID', session('id'))->first();
        return view('/main.queue', compact('category', 'queue', 'doctors', 'patient'));
    }

    public function admin() {
        return view('/main.admin-panel');
    }

    public function register() {
    	return view('/main.register');
    }
}
