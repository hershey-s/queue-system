<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    public function add_patient(Request $r) {
    	$p = new Patient;
    	$p->fullname = $r->fullname;
    	$p->birthday = $r->birthday;
    	$p->sex = $r->sex;
    	$p->address = $r->address;
    	$p->civilstatus = $r->civilstatus;
        $p->username = $r->username;
        $p->password = $r->password;
    	$p->save();
    	return back();
    }

    public function view_patients() {
        $patients = Patient::all();
        return view('/main.patient-list', compact('patients'));
    }
}