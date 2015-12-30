<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">close</span></button>
                <h3 id="modalTitle" class="modal-title">Chosen Date: <span id="date_selected"></span></h3>
            </div>
            <div id="modalBody" class="modal-body">
                {!! Form::open(['route'=> 'reservations.store', 'class' => 'form', 'id' => 'reservation_form']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <h4>Step 1: When do you want to come in?</h4>
                        <input type="hidden" name="json_date" class="json_date" id="json_date">
                        <div class="selection-radio">
                            <label>
                                <input type="radio" name="time_selection" value="8:00:00" checked>
                                8:00am - 9:00am <span class="spots-left">(<span class="option1"></span> spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time_selection" value="9:00:00">
                                9:00am - 10:00am <span class="spots-left">(<span class="option2"></span> spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time_selection" value="10:00:00">
                                10:00am - 11:00am <span class="spots-left">(<span class="option3"></span> spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time_selection" value="11:00:00">
                                11:00am - 12:00pm <span class="spots-left">(<span class="option4"></span> spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time_selection" value="12:00:00">
                                12:00pm - 1:00pm <span class="spots-left">(<span class="option5"></span> spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time_selection" value="13:00:00">
                                1:00pm - 2:00pm <span class="spots-left">(<span class="option6"></span> spots left)</span>
                            </label>


                        </div>
                        <p><strong>Note:</strong> This is not a reservation. Employees will be fingerprinted in the order they arrive.</p>
                    </div>
                    <div class="vertical-line"></div>
                    <div class="col-md-6">
                        <h4>Step 2: Verify your identity</h4>
                        <div class="form-group verify-identity">
                            {!! Form::label('physician_first_name', 'Your First Name')!!}
                            {!! Form::text('physician_first_name', '',
                                array(
                                'id'            => 'physician_first_name',
                                'class'         => 'form-control',
                                'maxlength'     => '30',
                                'minlength'     => '2',
                                'placeholder'   => 'John',
                                'required',
                                'autofocus'
                                ))
                            !!}

                            {!! Form::label('physician_last_name', 'Your Last Name')!!}
                            {!! Form::text('physician_last_name', '',
                                array(
                                'id'            => 'physician_last_name',
                                'class'         => 'form-control',
                                'maxlength'     => '30',
                                'minlength'     => '2',
                                'placeholder'   => 'Smith',
                                'required'
                                ))
                            !!}

                            {!! Form::label('physician_specialty', 'Your Specialty')!!}
                            {!! Form::text('physician_specialty', '',
                                array(
                                'id'            => 'physician_specialty',
                                'class'         => 'form-control',
                                'maxlength'     => '30',
                                'minlength'     => '2',
                                'placeholder'   => 'Radiology',
                                'required'
                                ))
                            !!}

                            {!! Form::label('physician_email', 'Your Winthrop Email Address')!!}
                            {!! Form::email('physician_email', '',
                                array(
                                'id'            => 'physician_email',
                                'class'         => 'form-control',
                                'maxlength'     => '30',
                                'minlength'     => '2',
                                'placeholder'   => 'name@winthrop.org',
                                'required'
                                ))
                            !!}

                        </div>

                        {!! Form::submit('Confirm', ['class' => 'btn btn-primary submit']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>