<?php

//Pages Controller
Route::get('/', 'PagesController@index')->middleware('WhenLoggedIn');  //Login 
Route::post('/', 'LoginController@login')->middleware('WhenLoggedIn'); //Login

Route::get('/register', 'PagesController@register')->middleware('WhenLoggedIn'); //Register
Route::post('/register', 'PatientController@add_patient')->middleware('WhenLoggedIn'); //Register

Route::middleware('LoginCheck')->group(function() {

	Route::get('/patient-records', 'PagesController@patient_record');
	Route::get('/edit-profile', 'PagesController@edit_profile');
	Route::post('/edit-profile', 'PatientController@update_profile');
	Route::get('/change-password', 'PagesController@change_password');
	Route::post('change-password', 'PatientController@save_password');
	Route::get('/queue', 'PagesController@queue');
	Route::get('/add-to-queue', 'QueueController@add_queue');
	Route::get('/logout', 'LoginController@logout');

	Route::get('/sendSMS', 'QueueController@sendSMS');
Route::get('/sessions', function() {
			return session()->all();
		});
	Route::middleware('AdminCheck')->group(function() {
		Route::get('/admin-panel', 'PagesController@admin');
		Route::get('/finish/{item}', 'MasterRecordController@finish');
		Route::get('/cancel/{item}', 'QueueController@cancel');
		Route::post('/update-queue-details', 'QueueController@update_queue');
		Route::get('/checkup-page', 'PagesController@checkup');
		Route::post('/checkup-page', 'CheckupTypeController@add_checkupCategory');
		Route::get('/doctors-list', 'PagesController@doctors');
		Route::get('/master-record', 'PagesController@master_list');
		Route::get('/patient-list', 'PatientController@view_patients');
		
	});
});