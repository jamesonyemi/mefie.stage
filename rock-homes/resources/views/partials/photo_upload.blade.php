<!-- Modal -->
<div class="modal fade" id="basicModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Settings</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true" id="dismiss">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form  action="{!! route('upc-photo') !!}" enctype="multipart/form-data" id="form-data" method="POST" >
                   @csrf
                    <div class="form-row">
                        <!--<div class="col-1"></div>-->
                        <div class="form-group col-md-6">
                            <label for="validate_region">Comapany Logo</label>
                            <input type="file" class="form-control" id="photo" name="photo" required >
                        </div>
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-5">
                            <label for="rfrom">Phone Number</label>
                            <input type="tel" class="form-control" id="phone_no" name="phone_no" required  maxlength="15">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-submit">Save changes</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal -->