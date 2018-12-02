<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use DB;

class PatientController extends Controller
{
    public function add_patient(Request $r) {
    	$p = new Patient;
    	$p->fullname = $r->fullname;
    	$p->birthday = $r->birthday;
    	$p->sex = $r->sex;
    	$p->address = $r->address;
    	$p->civilstatus = $r->civilstatus;
        $p->mobileNo = $r->mobileNo;
        $p->username = $r->username;
        $pword = md5(hash('sha512', $r->password).hash('ripemd160', $r->password));
        $p->password = $pword;
        $p->userType = 'User';
    	$p->save();
    	return redirect('/admin-panel');
    }

    public function view_patients() {
        $patients = Patient::where('userType', '!=', 'admin')->get();
        return view('/main.patient-list', compact('patients'));
    }

    public function update_profile(Request $r) {
        Patient::where('patientID', $r->up_id);

        $details_array = array(
            'fullname' => $r->up_name,
            'birthday' => $r->up_bday,
            'sex' => $r->up_sex,
            'address' => $r->up_address,
            'civilstatus' => $r->up_civil,
            'mobileNo' => $r->up_mobile
        );
        DB::table('patients')->where('patientID', $r->up_id)->update($details_array);
        // session()->put('fullname', $r->up_name);
        Session::set('fullname', $r->up_name);
        return redirect('/patient-records');
    }
    
    public function save_password(Request $r) {
        $pw1 = $r->ch_pass;
        $pw2 = $r->re_pass;

        if($pw1 == $pw2) {
            $password = md5(hash('sha512', $r->ch_pass).hash('ripemd160', $r->ch_pass));
            DB::table('patients')->where('patientID', session('id'))->update(['password' => $password]);
            return redirect('/patient-records');
        }
        else {
            $msg = 'The passwords do not match!';
            $class = 'danger';
            return view('/main.change-password')->with('errMsg', $msg)->with('class', $class);
        }
    }

    public function tester($item) {
        DB::select('DELETE FROM patients WHERE patientID = '.$item);
        return back();
    }
}
