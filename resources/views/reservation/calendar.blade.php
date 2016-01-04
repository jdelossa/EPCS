@extends('reservation.templates.default')

@section('content')
    <script type="text/javascript" src="js/main.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('reservation.sidebar')
            </div>
            <div class="col-md-8">
                <div class="calendar-container">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    @include('reservation.modals.form')

@endsection
