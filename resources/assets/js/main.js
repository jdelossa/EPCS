$(document).ready(function(){
    // On Modal Close
    $('#fullCalModal').on('hidden.bs.modal', function (e) {
        // Reset validation and inputs
        $('form').parsley().reset();
        $('form').find('input[type="text"], input[type="email"], input[type="radio"]').val('');
        $('.spots-left').find('span').remove();
    });

    $('#fullCalModal').on('shown.bs.modal', function (e) {
        // Parsley
        $('form').parsley();
        // Submit Form
        $('.submit').click(function(){
            $('form').submit();
        });
        // Disable
        $('input[type=radio][disabled]').parent().addClass('zero').css('background', '#DADADA');
    });

    var calendar = {
        init : function(){
            this.reservations = reservations;
            this.formatReservations();
            this.build();
        },
        formatReservations : function() {

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
                    $("#fullCalModal").modal("show");

                    $('#fullCalModal').on('shown.bs.modal', function (e) {
                        $('.date-selected').html('Chosen Date: ' + date.format());
                        $.ajax({
                           url: '/times',
                           type: 'GET',
                           dataType: "json",

                           success: function (data) {
                               $.each(data, function (key, value) {

                                   if ((date.format()) === value.date) {
                                       console.log(value);

                                       var option1 = "08:00:00";
                                       var option2 = "09:00:00";
                                       var option3 = "10:00:00";
                                       var option4 = "11:00:00";
                                       var option5 = "12:00:00";
                                       var option6 = "13:00:00";
                                       var count = 40;

                                       switch (true) {
                                           case ((value.time == option1)):
                                               $('.option1').append(count - value.count);
                                               break;
                                           case ((value.time == option2)):
                                               $('.option2').append(count - value.count);
                                               break;
                                           case ((value.time == option3)):
                                               $('.option3').append(count - value.count);
                                               break;
                                           case ((value.time == option4)):
                                               $('.option4').append(count - value.count);
                                               break;
                                           case ((value.time == option5)):
                                               $('.option5').append(count - value.count);
                                               break;
                                           case ((value.time == option6)):
                                               $('.option6').append(count - value.count);
                                               break;
                                       }
                                   }
                               });
                           }
                        });
                    });
                }
            });
        }
    };

    calendar.init();

});