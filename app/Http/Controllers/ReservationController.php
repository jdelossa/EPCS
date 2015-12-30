<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Reservation;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

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
        // validation
        $rules = array(
            'time_selection'            => 'required',
            'physician_first_name'      => 'required',
            'physician_last_name'       => 'required',
            'physician_specialty'       => 'required',
            'physician_email'           => 'required|email'
        );

        // store
        $reservation = new Reservation;
        $reservation->date            = Input::get('json-date');
        $reservation->time            = Input::get('time-selection');
        $reservation->first_name      = Input::get('physician-first-name');
        $reservation->last_name       = Input::get('physician-last-name');
        $reservation->specialty       = Input::get('physician-special');
        $reservation->email           = Input::get('physician-email');
        $reservation->save();

        return Redirect::back()->with('status', 1);

    }

    public function getTimes()
    {
        return DB::table('reservations')->select(DB::raw('count(*) as count', 'time'))->addSelect('time')->groupby('time')->addSelect('date')->groupBy('date')->get();
    }

}
