<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>EPCS ID Proofing Scheduler</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="/css/all.css">
    <!-- Scripts -->
    <script type="text/javascript" src="js/all.js"></script>
</head>
<body>
<!--[if lte IE 8]>
<div class="alert alert-danger" role="alert">
    <p class="browserupgrade text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>

    <style type="text/css">
        .navbar-static-top img, .calendar-container { display: none; }
        .navbar-static-top .navbar-brand { padding-left: 0; }
    </style>
</div>
<![endif]-->
<nav class="navbar navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <img src="img/WinthropLogo.png" alt="Winthrop Logo">
            <a class="navbar-brand" href="#">EPCS ID Proofing Scheduler</a>
        </div>
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->

<div class="container">

    <div class="row">

        <div class="col-md-3 col-md-push-9">
            <h4>General Information</h4>
            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>

            <h4>Contact Us</h4>
            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p><br>

            <p><strong>Phone: </strong><a href="#">516-663-1756</a></p>
            <p><strong>Email: </strong><a href="#">fingerprint@winthrop.org</a></p>

        </div>

        <div class="col-md-9 col-md-pull-3">
            <div class="calendar-container">
                {{--{{$reservations}}--}}
                <div id="calendar"></div>
            </div>
        </div>

    </div>


</div> <!-- /container -->


<!-- Modal -->
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">close</span></button>
                <h3 id="modalTitle" class="modal-title"><span class="date-selected">January 5, 2016</span></h3>

            </div>
            <div id="modalBody" class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Step 1: When do you want to come in?</h4>

                       
                    </div>
                    <div class="col-sm-6">
                        <h4>Step 1: When do you want to come in?</h4>
                        <div class="selection-radio">
                            <label>
                                <input type="radio" name="time-selection" id="first" value="option1" checked>
                                8:00am - 9:00am <span class="spots-left high">(39 spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time-selection" id="second" value="option2">
                                9:00am - 10:00am <span class="spots-left low">(6 spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time-selection" id="third" value="option3">
                                10:00am - 11:00am <span class="spots-left high">(40 spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time-selection" id="fourth" value="option4">
                                11:00am - 12:00pm <span class="spots-left medium">(10 spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time-selection" id="fifth" value="option5">
                                12:00pm - 1:00pm <span class="spots-left high">(39 spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time-selection" id="sixth" value="option6" disabled>
                                1:00pm - 2:00pm <span class="spots-left zero">(0 spots left)</span>
                            </label>
                            </label>
                        </div>
                        <p><strong>Note:</strong> This is not a reservation. Employees will be fingerprinted in the order they arrive.</p>
                    </div>
                    <div class="vertical-line"></div>
                    <div class="col-sm-6">
                        <h4>Step 2: Verify your identity</h4>
                        <form id="form" class="verify-identity" action="#">
                            <div class="form-group">
                                <label for="physician-first-name" parsley-error>Your First Name</label>
                                <input type="text" min-length="2" placeholder="John" id="physician-first-name" class="form-control" required/>
                                <label for="physician-last-name">Your Last Name</label>
                                <input type="text" min-length="2" placeholder="Smith" id="physician-last-name" class="form-control" required/>
                                <label for="physician-special">Your Specialty</label>
                                <input type="text" min-length="2" placeholder="Radiology" id="physician-special" class="form-control" required/>
                                <label for="physician-email">Your Winthrop Email Address</label>
                                <input type="email" placeholder="flastname@winthrop.org" id="physician-email" class="form-control" required/>
                            </div>
                        </form>

                        <input type="submit" class="btn btn-primary submit" value="Confirm"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>
