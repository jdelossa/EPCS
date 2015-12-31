<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Reservation;

class ListController extends Controller
{
    /**
     * Display all entries in database.
     *
     * @return Response
     */
    public function index()
    {
        $reservations = DB::table('reservations')
            ->orderBy('date', 'asc')
            ->select('email')
            ->addSelect('date')
            ->addSelect('time')
            ->orderBy('time', 'asc')
            ->addSelect('first_name')
            ->addSelect('last_name')
            ->get();

        $dateCount = DB::table('reservations')
            ->select(DB::raw('count(*) as count, date'))
            ->groupBy('date')
            ->addSelect('date')
            ->get();

        return view('reservation.list')->with('reservations', $reservations)->with('dateCount', $dateCount);
    }

}
