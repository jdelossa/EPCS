<?php

Route::get('/', 'ReservationController@index');
Route::resource('reservations', 'ReservationController');

Route::get('times', 'ReservationController@getTimes');