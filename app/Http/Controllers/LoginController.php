<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class LoginController extends Controller
{
    public function login(Request $r) {
    	$p = new Patient;
    	$uname = $r->username;
        $pword = md5(hash('sha512', $r->password).hash('ripemd160', $r->password));
    	$patient = $p->where('username', $uname)->where('password', $pword)->first();
    	
    	if($patient) {
    		session()->put('username', $uname);
    		session()->put('fullName', $patient->fullname);
    		session()->put('bday', $patient->birthday);
    		session()->put('sex', $patient->sex);
    		session()->put('address', $patient->address);
    		session()->put('id', $patient->patientID);
            session()->put('userType', $patient->userType);

            if($patient->userType === 'admin') {
                return redirect('/admin-panel');
            }
            else {
    		    return redirect('/patient-records');
            }
    	}
    	else {
    		$msg = 'Login Failed';
    		return redirect('/')->withErrors(['Login Failed', 'danger']);
    	}
    }

    public function logout() {
    	session()->flush();
    	return redirect('/');
    }
}
