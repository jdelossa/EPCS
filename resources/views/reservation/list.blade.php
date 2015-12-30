@extends('reservation.templates.default')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->first_name }}</td>
                        <td>{{ $reservation->last_name }}</td>
                        <td><a href="mailto:{{ $reservation->email}}">{{ $reservation->email}}</a></td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->time }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Count</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($dateCount as $count)
                        <tr>
                            <td>{{ $count->date }}</td>
                            <td>{{ $count->count }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
