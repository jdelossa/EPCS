@extends('reservation.templates.default')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Physicians Per Day</div>
                    <div class="panel-body">
                        <canvas id="list_view" height="400"></canvas>
                        <script type="text/javascript">
                            var reservations = <?php echo json_encode($reservations); ?>;
                            var data = reservations;
                            // dates
                            var dates = [];
                            for (var i = 0; i < data.length; i++) {
                                dates.push(data[i].date.replace('2016-', ''));
                            }
                            // count
                            var count =[];
                            for (var i = 0; i < data.length; i++) {
                                count.push(data[i].count);
                            }
                            // bar graph data
                            var barData = {

                                labels : dates,
                                datasets : [
                                    {
                                        fillColor : "#6094B3",
                                        strokeColor : "#3786B5",
                                        data: count
                                    }
                                ]
                            }
                            // get bar chart canvas
                            var list_view = document.getElementById("list_view").getContext("2d");
                            // draw bar chart
                            new Chart(list_view).Bar(barData, {
                                scaleShowGridLines : false,
                                barValueSpacing : 100,
                                barDatasetSpacing : 100,
                            });
                        </script>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">

            @foreach($dateCount as $count)

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ date('M d, Y', strtotime($count->date)) }}
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>{{ $count->time }} - end</td>
                                    <td>{{ $count->count}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection
