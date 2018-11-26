<?php
//Pages Controller
Route::get('/', 'PagesController@index')->middleware('WhenLoggedIn');  //Login 
Route::post('/', 'LoginController@login')->middleware('WhenLoggedIn'); //Login

Route::middleware('LoginCheck')->group(function() {

	Route::get('/patient-records', 'PagesController@patient_record')->middleware('PatientOnly');
	Route::get('/edit-profile', 'PagesController@edit_profile');
	Route::post('/edit-profile', 'PatientController@update_profile');
	Route::get('/change-password', 'PagesController@change_password');
	Route::post('change-password', 'PatientController@save_password');
	Route::get('/queue', 'PagesController@queue')->middleware('CloseOpen');
	Route::get('/add-to-queue', 'QueueController@add_queue');
	Route::get('/logout', 'LoginController@logout');
	Route::post('/realtime-queue', 'PagesController@realtime_queue');

	//Admin Pages
	Route::middleware('AdminCheck')->group(function() {
		Route::get('/register', 'PagesController@register');
		Route::post('/register', 'PatientController@add_patient');
		Route::get('/admin-panel', 'PagesController@admin');
		Route::post('/admin-panel',	'PagesController@status');
		Route::get('/finish/{item}', 'MasterRecordController@finish');
		Route::get('/cancel/{item}', 'QueueController@cancel');
		Route::get('/queue-details', 'PagesController@queue_details');
		Route::post('/queue-details', 'QueueController@update_queue');
		Route::get('/checkup-page', 'PagesController@checkup');
		Route::post('/checkup-page', 'CheckupTypeController@add_checkupCategory');
		Route::get('/doctors-list', 'PagesController@doctors');
		Route::get('/master-record', 'PagesController@master_list');
		Route::get('/patient-list', 'PatientController@view_patients');
		Route::get('/sendSMS', 'QueueController@sendSMS');
		Route::get('/sessions', function() {
			return session()->all();
		});
	});
});