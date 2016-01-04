<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ReservationRequest;
use App\Reservation;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;
use Illuminate\Support\Facades\Input;

class ReservationController extends Controller
{
    /**
     * Display the calendar with reservations.
     *
     * @return Response
     */
    public function index()
    {
        $reservations = DB::table('reservations')->select(DB::raw('count(*) as count, date'))->groupBy('date')->get();

        JavaScript::put(['reservations' => $reservations]);

        return view('reservation.calendar');
    }

    /**
     * Save a reservation record to the database.
     *
     * @param ReservationRequest $request
     * @return mixed
     */
    public function store(ReservationRequest $request)
    {
        $reservation = Reservation::firstOrCreate(['email' => Input::get('physician_email')]);
        $reservation->date = Input::get('json_date');
        $reservation->time = Input::get('time_selection');
        $reservation->first_name = Input::get('physician_first_name');
        $reservation->last_name = Input::get('physician_last_name');
        $reservation->specialty = Input::get('physician_specialty');
        $reservation->email = Input::get('physician_email');

        if ($reservation->save())

        {
            $data = ['date' => $reservation->date, 'time' => $reservation->time];

            Mail::send('emails.confirmation', $data, function ($m) use ($reservation) {
                $m->from('DoNotReply@winthrop.org', 'Winthrop-University Hospital');
                $m->to($reservation->email, $reservation->email)->subject('EPCS Fingerprinting Reminder');
            });

            return response()->json(['first_name' => $reservation->first_name, 'message' => 'Submission Successful']);
        }
    }

    /**
     * Return times and their count for the date specified.
     *
     * @return mixed
     */
    public function getReservationsByDate()
    {
        $date = $_GET['date'];

        return DB::table('reservations')->select(DB::raw('count(*) as count', 'time'))->where('date', $date)->addSelect('time')->groupby('time')->get();
    }
}
