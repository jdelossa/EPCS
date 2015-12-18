
$(document).ready(function() {
    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
        weekends: false,
        header: {
            left: 'prev',
            center: 'title',
            right: 'next'
        },
        defaultDate: '2016-01-04',
        aspectRatio: 1.2,
        eventRender:  function(event, element){
            if(event.title == 'High Availability') {
                element.append("<p class='event-title high'>High <br>Availability</p>")
            } else if (event.title == "Medium Availability") {
                element.append("<p class='event-title medium'>Medium <br>Availability</p>")
            } else {
                element.append("<p class='event-title low'>Low <br>Availability</p>")
            }
        },
        events: [
            {
                title: 'High Availability',
                start: '2016-01-04',
                rendering: 'background',
                color: '#F3FFF8'

            },
            {
                title: 'High Availability',
                start: '2016-01-05',
                rendering: 'background',
                color: '#F3FFF8'
            },
            {
                title: 'High Availability',
                start: '2016-01-06',
                rendering: 'background',
                color: '#F3FFF8'
            },
            {
                title: 'High Availability',
                start: '2016-01-07',
                rendering: 'background',
                color: '#F3FFF8'
            },
            {
                title: 'Medium Availability',
                start: '2016-01-11',
                rendering: 'background',
                color: '#f0f1db'
            },
            {
                title: 'High Availability',
                start: '2016-01-12',
                rendering: 'background',
                color: '#F3FFF8'
            },
            {
                title: 'Medium Availability',
                start: '2016-01-13',
                rendering: 'background',
                color: '#f0f1db'
            },
            {
                title: 'Medium Availability',
                start: '2016-01-14',
                rendering: 'background',
                color: '#f0f1db'
            },

            {
                title: 'Low Availability',
                start: '2016-01-18',
                rendering: 'background',
                color: '#f5cfce'
            },
            {
                title: 'Low Availability',
                start: '2016-01-19',
                rendering: 'background',
                color: '#f5cfce'
            },
            {
                title: 'High Availability',
                start: '2016-01-20',
                rendering: 'background',
                color: '#F3FFF8'
            },
            {
                title: 'High Availability',
                start: '2016-01-21',
                rendering: 'background',
                color: '#F3FFF8'
            },
            {
                title: 'Medium Availability',
                start: '2016-01-25',
                rendering: 'background',
                color: '#f0f1db'
            },
            {
                title: 'Low Availability',
                start: '2016-01-26',
                rendering: 'background',
                color: '#f5cfce'
            },
            {
                title: 'Low Availability',
                start: '2016-01-27',
                rendering: 'background',
                color: '#f5cfce'
            },
            {
                title: 'High Availability',
                start: '2016-01-28',
                rendering: 'background',
                color: '#F3FFF8'
            }
        ],
        dayClick: function(date, jsEvent, view) {
            $("#fullCalModal").modal("show");
        },
    });


    // MODAL



    // On Modal Close
    $('#fullCalModal').on('hidden.bs.modal', function (e) {
        // Reset validation and inputs
        $('#form').parsley().reset();
        $('#form').find('input, textarea').val('');
        $('#form').find('select').val('Select');
    });

    // On Modal Open
    $('#fullCalModal').on('shown.bs.modal', function (e) {
        // Parsley
        $('#form').parsley();

        // Submit Form
        $('.submit').click(function(){
            $('#form').submit();
        });

        // Disable
        $('input[type=radio][disabled]').parent().addClass('zero').css('background', '#DADADA');

    });

});
