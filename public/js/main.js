$(document).ready(function(){
    $('#fullCalModal').on('hidden.bs.modal', function (e) {
        $('form').parsley().reset();
        $('form').find('input[type="text"], input[type="email"]').val('');
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
                    /* If the AJAX request was successful, that means no exceptions
                        were thrown and the record was saved. So this is where you
                        can signal to the user it was a success.  For example,
                        you can replace the form with a fade-in success message.
                     */

                    $(".modal-dialog").removeClass('modal-lg');
                    $(".modal-title").empty().html(data.message);
                    $(".modal-header").css('background', '#57AD57');
                    $(".modal-body").empty().append("Thank you, "+data.first_name+"! You will receive an email shortly.");


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
                '2016-01-18',
                '2016-01-19',
                '2016-01-20',
                '2016-01-21',
                // week 2
                '2016-01-25',
                '2016-01-26',
                '2016-01-27',
                '2016-01-28',
                // week 3
                '2016-02-01',
                '2016-02-02',
                '2016-02-03',
                '2016-02-04',
                // week 4
                '2016-02-08',
                '2016-02-09',
                '2016-02-10',
                '2016-02-11'
            ];
            this.reservations = reservations;
            this.build();
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
                defaultDate: '2016-01-18',
                eventSources: {
                    events: this.reservations,
                    rendering: 'background',
                    color: 'white'
                },

                eventRender:  function(reservation, element){
                    switch (true) {
                        case (reservation.count == 240):
                            element.append("<p class='event-title zero zero-bg'>No<br>Availability </p>");
                            break;
                        case (reservation.count > 120 && reservation.count < 240):
                            element.append("<p class='event-title low low-bg'>Low <br>Availability</p>");
                            break;
                        case (reservation.count > 60 && reservation.count <= 120):
                            element.append("<p class='event-title medium medium-bg'>Medium <br>Availability</p>");
                            break;
                        case (reservation.count < 60 || reservation.count == 60 ):
                            element.append("<p class='event-title high high-bg'>High <br>Availability</p>");
                            break;
                    }
                },

                dayClick: function(date, jsEvent, view) {

                    if($.inArray(date.format() , calendar.dates) !== -1)
                    {
                        $("#fullCalModal").modal("show");

                        $('#fullCalModal').on('shown.bs.modal', function (e) {
                            $.ajax({
                                url: '/times',
                                type: 'GET',
                                dataType: "json",
                                success: function (data) {
                                    $('#date_selected').html(date.format('MMMM DD, YYYY'));
                                    $('#json_date').val(date.format());

                                    $.each(data, function (key, value) {

                                        if ((date.format()) === value.date) {

                                            var option1 = "08:00:00";
                                            var option2 = "09:00:00";
                                            var option3 = "10:00:00";
                                            var option4 = "11:00:00";
                                            var option5 = "12:00:00";
                                            var option6 = "13:00:00";
                                            var count = 40;

                                            if ((value.count) < count) {
                                                switch (true) {
                                                    case ((value.time == option1)):
                                                        $('.option1').empty().append(count - value.count);
                                                        break;
                                                    case ((value.time == option2)):
                                                        $('.option2').empty().append(count - value.count);
                                                        break;
                                                    case ((value.time == option3)):
                                                        $('.option3').empty().append(count - value.count);
                                                        break;
                                                    case ((value.time == option4)):
                                                        $('.option4').empty().append(count - value.count);
                                                        break;
                                                    case ((value.time == option5)):
                                                        $('.option5').empty().append(count - value.count);
                                                        break;
                                                    case ((value.time == option6)):
                                                        $('.option6').empty().append(count - value.count);
                                                        break;
                                                }
                                            }
                                            else if ((value.count) >= count) {
                                                switch (true) {
                                                    case ((value.time == option1)):
                                                        $('.option1').empty().append(0);
                                                        break;
                                                    case ((value.time == option2)):
                                                        $('.option2').empty().append(0);
                                                        break;
                                                    case ((value.time == option3)):
                                                        $('.option3').empty().append(0);
                                                        break;
                                                    case ((value.time == option4)):
                                                        $('.option4').empty().append(0);
                                                        break;
                                                    case ((value.time == option5)):
                                                        $('.option5').empty().append(0);
                                                        break;
                                                    case ((value.time == option6)):
                                                        $('.option6').empty().append(0);
                                                        break;
                                                }
                                            }
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