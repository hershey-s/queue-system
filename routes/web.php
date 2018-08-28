<?php

Route::get('/', 'PagesController@index');
Route::get('/register', 'PagesController@register');
Route::post('/register', 'PatientController@add_patient');
Route::get('/login', 'PagesController@login');
Route::get('/patient-records', 'PagesController@patient');
Route::get('/queue', 'PagesController@queue');
Route::get('/patient-list', 'PatientController@view_patients');