<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Reservation;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    /**
     * Display the calendar with reservations
     *
     * @return Response
     */
    public function index()
    {
        // Returns all reservations as an array, grouped by date, with their reservation count.
        $reservations = DB::table('reservations')->select(DB::raw('count(*) as count, date'))->groupBy('date')->get();

        // Embed the reservation array into an javascript object
        JavaScript::put(['reservations' => $reservations]);

        return view('reservation.calendar');
    }

    public function store()
    {
        $reservations = new Reservation;
        $reservations->physician_first_name       = Input::get('physician_first_name');
        $reservations->physician_last_name        = Input::get('physician_last_name');
        $reservations->physician_speciality       = Input::get('physician_speciality');
        $reservations->physician_email            = Input::get('physician_email');

        $reservations->save();

        // redirect
        Session::flash('message', 'Successfully created nerd!');
        return Redirect::to('reservation.calendar');
    }

    public function getTimes()
    {
        return DB::table('reservations')->select(DB::raw('count(*) as count', 'time'))->addSelect('time')->groupby('time')->addSelect('date')->groupBy('date')->get();
    }

}
