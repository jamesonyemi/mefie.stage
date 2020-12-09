@include('partials.client-portal.master_header')

<div class="card mb-30">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3><?= strtoupper('submit more documents') ?></h3>
    </div>
    <div class="card-body">
        <form class="mt-5" action="{!! route('my-documents.update', Crypt::encrypt($project_docs->id))  !!}" 
             method="POST" enctype="multipart/form-data" >
            {{ csrf_field() }}
            @method("PUT")
        <div id="RepeatingFields">
            <div class="entry">
                <div class="form-row "> 
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-4">
                        <label for="rfrom">Document:</label>
                        <input type="file"  id="docname" name="docname[]" multiple accept=".doc, .docx, .pdf" class="form-control" required >
                    </div>
                    <div class="form-group col-md-2" style="margin:32px -10px 0px 10px;">
                        <span class="input-group-btn">
                                <button type="button" class="btn btn-secondary btn-sm rounded-pill btn-add">
                                    <span data-feather="file-plus" aria-hidden="true"></span>
                                </button>
                        </span>
                    </div>

                </div> 
            </div>
        </div><br><br>
             <hr style="background-color:fuchsia; opacity:0.1"><br> 
              <div class="container">
                  <div class="row">
                      <div class="col text-center">
                          <button type="submit" class="btn btn-lg btn-primary"><i data-feather="upload-cloud"></i>
                           Upload Document</button>
                        </div>
                        <div class="form-group col-md-2"></div>
                </div><br>
              </div>
        </form>
       
    </div>
</div>


@include('partials.client-portal.footer')

<script>
$(function() {
    let repeater    =   $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        let controlForm  =  $('#RepeatingFields:first'),
            currentEntry =  $(this).parents('.entry:last'),
            newEntry     =  $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('').addClass('bx bx-trash');
    });
    repeater.on('click', '.btn-remove', function(e) {
        e.preventDefault();
        $(this).parents('.entry:first').remove();
        return false;
    });
});

</script>