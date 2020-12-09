<div class="row">
<!-- Small modal -->
<div class="modal fade bd-example-modal-sm col-12 text-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="top: 5%;">
  <div class="modal-dialog modal-sm">
      <div class="modal-content" style="right: 2%;">
          <form id="deleteForm" method="POST" >
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="DELETE">
              <div class="mt-3">
                 <h5 class="text-default col text-center">
                    <b>Deleting record..?</b>
                  </h5>
                 <div class="col text-center">
                     <span class="text-secondary">
                      <p>This can't be undone if deleted</p>
                     </span>
                 </div>
              </div>
              <div class="container">
                  <div class="row">
                      <div class="col-1"></div>
                      <div class="col-4">
                          <button type="button" class="btn btn-secondary rounded-pill btn-md" data-dismiss="modal">Cancel</button>
                      </div>
                      <div class="col-2"></div>
                      <div class="row">
                          <div>
                              <a  href="#" class="d-inline-block text-danger">
                              <button type="submit" id="btn-delete" class="btn btn-danger rounded-pill btn-md">Yes, Delete</button>
                              </a>
                          </div>
                      </div>
                      </div>
                  </div>
                  <br>
                </div>
          </form>
      </div>
  </div>
<!-- Small modal -->
</div>

