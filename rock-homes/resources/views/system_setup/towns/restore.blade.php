<!-- Restore Deleted Towns modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
          <div class="col-12">
            <h5 class="modal-title" id="exampleModalLongTitle">Restore Town</h5>
            <small class="">
              <p class="">Show list of deactivated towns, if available</p>
            </small>
          </div>
        </div>
        <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        <form class="mt-2" action="#"  method="POST" id="form">
          {{ csrf_field() }}
          @method("PUT")
          <div class="form-row">
            <div class="form-group col-md-1 col-sm-1"></div>
              <div class="form-group col-md-10 col-sm-10">
              <label for="towns">Towns</label>
              <select id="tid" name="tid" class="mb-3 form-control custom-select" required>
                @foreach ($regionTown as $key => $town)
                  @if ( ( $town->is_deleted == true )  )
                      <option value="{!! ($town->tid) !!}"  >{{ $town->town }}</option>
                  @endif
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-1 col-sm-1"> </div>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
          <button type="button" class="btn btn-primary" id="btn_submit">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Restore Deleted Towns modal -->
<script>
  let list           = document.getElementById("tid");
  let btnSaveChanges = document.getElementById("btn_submit");
  let notify         = document.getElementById("modal-body");
  let ModalTitle     = document.getElementById("exampleModalLongTitle");
  let closeModal     = document.getElementById("close-modal");
  console.log(document.getElementById("btn_submit"));
  
 btnSaveChanges.addEventListener('click', (e) => {
   let getId = list.options[list.selectedIndex].value;
   fetch(`{!! url('admin-portal/system-setup/towns/get-restore-data') !!}` + '/' +getId )
     .then(response => response.json())
     .then(data => console.log(data))
   ModalTitle.textContent = list.options[list.selectedIndex].text;
   notify.textContent     = " "+"Restoring... " + ModalTitle.textContent;
   notify.classList.add("badge");
   notify.classList.add("badge-primary");
     setTimeout(() => {
       location.reload();
     },5000);
 });

</script>
