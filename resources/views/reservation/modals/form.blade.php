<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">close</span></button>
                <h3 id="modalTitle" class="modal-title"><span class="date-selected"></span></h3>
            </div>
            <div id="modalBody" class="modal-body">
                {!! Form::open(['route'=> 'reservations.store', 'class' => 'form']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <h4>Step 1: When do you want to come in?</h4>
                        <input type="hidden" name="json-date" class="json-date">
                        <div class="selection-radio">

                            <label>
                                <input type="radio" name="time-selection" value="8:00:00" checked>
                                8:00am - 9:00am <span class="spots-left">(<span class="option1">40</span> spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time-selection" value="9:00:00">
                                9:00am - 10:00am <span class="spots-left">(<span class="option2">40</span> spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time-selection" value="10:00:00">
                                10:00am - 11:00am <span class="spots-left">(<span class="option3">40</span> spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time-selection" value="11:00:00">
                                11:00am - 12:00pm <span class="spots-left">(<span class="option4">40</span> spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time-selection" value="12:00:00">
                                12:00pm - 1:00pm <span class="spots-left">(<span class="option5">40</span> spots left)</span>
                            </label>

                            <label>
                                <input type="radio" name="time-selection" value="13:00:00">
                                1:00pm - 2:00pm <span class="spots-left">(<span class="option6">40</span> spots left)</span>
                            </label>


                        </div>
                        <p><strong>Note:</strong> This is not a reservation. Employees will be fingerprinted in the order they arrive.</p>
                    </div>
                    <div class="vertical-line"></div>
                    <div class="col-md-6">
                        <h4>Step 2: Verify your identity</h4>
                        <div class="form-group verify-identity">
                            {!! Form::label('physician-first-name', 'Your First Name')!!}
                            {!! Form::text('physician-first-name', '',
                                array(
                                'id'            => 'physician-first-name',
                                'class'         => 'form-control',
                                'maxlength'     => '30',
                                'minlength'     => '2',
                                'placeholder'   => 'John',
                                'required',
                                'autofocus'
                                ))
                            !!}

                            {!! Form::label('physician-last-name', 'Your Last Name')!!}
                            {!! Form::text('physician-last-name', '',
                                array(
                                'id'            => 'physician-last-name',
                                'class'         => 'form-control',
                                'maxlength'     => '30',
                                'minlength'     => '2',
                                'placeholder'   => 'Smith',
                                'required'
                                ))
                            !!}

                            {!! Form::label('physician-special', 'Your Specialty')!!}
                            {!! Form::text('physician-special', '',
                                array(
                                'id'            => 'physician-special',
                                'class'         => 'form-control',
                                'maxlength'     => '30',
                                'minlength'     => '2',
                                'placeholder'   => 'Radiology',
                                'required'
                                ))
                            !!}

                            {!! Form::label('physician-email', 'Your Winthrop Email Address')!!}
                            {!! Form::email('physician-email', '',
                                array(
                                'id'            => 'physician-email',
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