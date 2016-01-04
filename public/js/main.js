$(document).ready(function(){
    $('#fullCalModal').on('hidden.bs.modal', function (e) {
        $('form').parsley().reset();
        $('form').find('input[type="text"], input[type="email"]').val('');
        location.reload();
    }
    ).on('shown.bs.modal', function (e) {
        $('form').parsley();
    });

    $('#reservation_form').submit(function( event ) {
        event.preventDefault();

        if ( $(this).parsley().isValid() ) {

            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: 'post',
                url: '/reservations',
                data: $('#reservation_form').serialize(),
                dataType: 'json',
                success: function(data){
                    $(".modal-dialog").removeClass('modal-lg');
                    $(".modal-title").empty().html(data.message);
                    $(".modal-header").css('background', '#57AD57');
                    $(".modal-body").empty().append("Thank you! You will receive an email shortly.");

                    // Refresh on modal close
                    $('#fullCalModal').on('hide.bs.modal', function (e) {
                        window.location.reload();
                    });
                },
                error: function(data){
                    var errors = data.responseJSON;
                }
            });
        }
    });

    var calendar = {
        init : function(){
            this.dates = [
                '2016-01-19',
                '2016-01-20',
                '2016-01-21',
                '2016-01-22',
            ];

            this.defaultEvents = this.defaults(this.dates);
            this.reservations = reservations;
            this.build();
        },
        defaults : function(dates){

            var defaultDates = [];

            dates.forEach(function(date){
                defaultDates.push({
                    start: date,
                    count: 0
                });
            });

            return defaultDates;
        },
        build : function() {
            $('#calendar').fullCalendar({
                weekends: false,
                header: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                aspectRatio: 1.2,
                eventSources: [
                    {
                        events: this.defaultEvents,
                        rendering: 'background',
                        color: 'white'
                    },
                    {
                        events: this.reservations,
                        rendering: 'background',
                        color: 'white'
                    },
                ],
                eventRender:  function(reservation, element){
                    switch (true) {
                        case (reservation.count > 250):
                            element.append("<p class='event-title low low-bg'>High <br>Volume</p>");
                            break;
                        case (reservation.count > 100 && reservation.count <= 250):
                            element.append("<p class='event-title medium medium-bg'>Medium <br>Volume</p>");
                            break;
                        case (reservation.count < 100):
                            element.append("<p class='event-title high high-bg'>Low <br>Volume</p>");
                            break;
                    }
                },
                dayClick: function(date, jsEvent, view) {
                    if($.inArray(date.format(), calendar.dates) !== -1)
                    {
                        $("#fullCalModal").modal("show");
                        $('#fullCalModal').on('shown.bs.modal', function () {

                            $('#date_selected').html(date.format('MMMM DD, YYYY'));
                            $('#json_date').val(date.format());

                            $.ajax({
                                url: '/times/{date}',
                                type: 'GET',
                                data: { date: date.format() },
                                dataType: "json",
                                success: function (data) {
                                    console.log(data);
                                    Object.keys(data).forEach(function(key) {
                                        switch (data[key].time) {
                                            case ("08:00:00"):
                                                $('#option1').empty().append(data[key].count);
                                                break;
                                            case ("09:00:00"):
                                                $('#option2').empty().append(data[key].count);
                                                break;
                                            case ("10:00:00"):
                                                $('#option3').empty().append(data[key].count);
                                                break;
                                            case ("11:00:00"):
                                                $('#option4').empty().append(data[key].count);
                                                break;
                                            case ("12:00:00"):
                                                $('#option5').empty().append(data[key].count);
                                                break;
                                            case ("13:00:00"):
                                                $('#option6').empty().append(data[key].count);
                                                break;
                                            case ("14:00:00"):
                                                $('#option7').empty().append(data[key].count);
                                                break;
                                            case ("15:00:00"):
                                                $('#option8').empty().append(data[key].count);
                                                break;
                                        }
                                    });
                                }
                            });
                        });
                    }
                }

            });
        }
    };

    calendar.init();

});