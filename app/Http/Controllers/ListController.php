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
            ->groupBy('date')
            ->select('date')
            ->addSelect(DB::raw('count(*) as count, date'))
            ->get();

        $dateCount = DB::table('reservations')
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->select('date', 'time')
            ->addSelect(DB::raw('count(*) as count, time'))
            ->get();

        return view('reservation.list')->with('reservations', $reservations)->with('dateCount', $dateCount);
    }

}
