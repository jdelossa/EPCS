
    <div id="confirmationModal" class="modal fade">
        <div class="modal-dialog modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">close</span></button>
                    <h3 id="modalTitle" class="modal-title"><i class="glyphicon glyphicon-ok-circle"></i>Appointment Confirmation</h3>
                </div>
                <div id="modalBody" class="modal-body">
                    <p>{{ session('status') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>