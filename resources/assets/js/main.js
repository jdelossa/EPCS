$(document).ready(function(){
    // On Modal Close
    $('#fullCalModal').on('hidden.bs.modal', function (e) {
        // Reset validation and inputs
        $('form').parsley().reset();
        $('form').find('input[type="text"], input[type="email"], input[type="radio"]').val('');
    });

    // On Modal Open
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
            // Modifications to the reservations array can be done here.
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
                        case (reservation.count > 60 && reservation.count < 120):
                            element.append("<p class='event-title medium medium-bg'>Medium <br>Availability</p>");
                            break;
                        case (reservation.count < 60):
                            element.append("<p class='event-title high high-bg'>High <br>Availability</p>");
                            break;
                    }
                },
                dayClick: function(date, jsEvent, view) {
                   if ($('tbody > tr > td.fc-bgevent')) {
                        $("#fullCalModal").modal("show");
                        $('.date-selected').html('Chosen Date: ' + date.format());
                        // ajax request here >>>?
                    } else {
                       $("#fullCalModal").modal("hide");
                   }

                },
            });
        }
    };

    calendar.init();

});