<?php
// main view
Route::get('/', 'ReservationController@index');
Route::resource('reservations', 'ReservationController');

Route::get('times', 'ReservationController@getTimes');

// list view
Route::get('list', 'ListController@index');
Route::resource('list', 'ListController');
