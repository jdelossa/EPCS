<?php

Route::get('/', 'ReservationController@index');
Route::resource('reservations', 'ReservationController');

Route::get('times/{date}', 'ReservationController@getReservationsByDate');

Route::get('list', 'ListController@index');
Route::resource('list', 'ListController');