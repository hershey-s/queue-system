<?php

//Pages Controller
Route::get('/', 'PagesController@index')->middleware('WhenLoggedIn');  //Login 
Route::post('/', 'LoginController@login')->middleware('WhenLoggedIn'); //Login

Route::get('/register', 'PagesController@register')->middleware('WhenLoggedIn'); //Register
Route::post('/register', 'PatientController@add_patient')->middleware('WhenLoggedIn'); //Register

Route::middleware('LoginCheck')->group(function() {

	Route::get('/patient-records', 'PagesController@patient_record');
	
	Route::get('/queue', 'PagesController@queue');
	Route::post('/queue', 'QueueController@add_queue');
	Route::get('/logout', 'LoginController@logout');

	Route::get('/sendSMS', function(){
		$myNum = '09219870637';
		$pos = 'You are now number 10 in the queue.';
		$name = 'Wanhitkeiow';
		return sendSMS($myNum, $pos);
	});
	Route::middleware('AdminCheck')->group(function() {
		Route::get('/admin-panel', 'PagesController@admin');
		Route::get('/update-status/{item}', 'QueueController@update');
		Route::get('/checkup-page', 'PagesController@checkup');
		Route::post('/checkup-page', 'CheckupTypeController@add_checkupCategory');
		Route::get('/doctors-list', 'PagesController@doctors');
		Route::get('/master-record', 'PagesController@master_list');
		Route::get('/patient-list', 'PatientController@view_patients');
		Route::get('/compile-records', 'MasterRecordController@compile');
		Route::get('/sessions', function() {
			return session()->all();
		});
	});
});