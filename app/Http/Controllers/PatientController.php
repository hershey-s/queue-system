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
        $p->mobileNo = '63'.$r->mobileNo;
        $p->username = $r->username;
        $p->password = $r->password;
        $p->userType = 'User';
    	$p->save();
    	return redirect('/');
    }

    public function view_patients() {
        $patients = Patient::where('userType', '!=', 'admin')->get();
        return view('/main.patient-list', compact('patients'));
    }
}
