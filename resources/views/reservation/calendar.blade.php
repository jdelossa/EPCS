@extends('reservation.templates.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-push-9">
            @include('reservation.sidebar')
        </div>
        <div class="col-md-9 col-md-pull-3">
            <div class="calendar-container">
                <div id="calendar"></div>
                {{--{{$reservations}}--}}
            </div>
        </div>
    </div>
</div>

@include('reservation.modals.form')

@endsection
