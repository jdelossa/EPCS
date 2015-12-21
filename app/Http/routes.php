<?php

Route::get('/', 'ReservationController@index');
Route::resource('reservations', 'ReservationController');
