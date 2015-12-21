<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;

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
        JavaScript::put(['reservations' => $reservations,]);

        return view('reservation.calendar');
    }

}
