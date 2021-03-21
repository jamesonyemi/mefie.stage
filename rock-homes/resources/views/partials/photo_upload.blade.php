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
                        <div class="form-group col-md-6 col-sm-12 col-lg-6">
                            <label for="Company-logo-upload">Company Logo</label>
                            <input type="file" class="form-control" id="photo" name="photo_url" accept=".jpeg, .png, .jpg, .gif,.svg" onChange="readURL(this);" required />
                        </div>
                        <div class="col-1"></div>
                        <div class="form-group col-md-5">
                            <img id="company-logo" src="#" alt="your company logo" />
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
