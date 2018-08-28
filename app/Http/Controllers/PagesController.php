<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
    	return view('main.index');
    }

    public function register() {
    	return view("/main.register");
    }

	public function login() {
		return view("/main.login");
	}

    public function patient() {
    	return view("/main.patient-records");
    }	

    public function queue() {
    	return view("/main.queue");
    }	
}
