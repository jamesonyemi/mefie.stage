@include('partials.master_header')
        <!-- Start -->
        <div class="row mt-5 cmb-3">
             <div class="ml-3">
                 <h3>Edit Onsite Info</h3>
             </div>
         </div>
        <div class="card mb-30 mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                @foreach ($getAllVisit as $visit)
                <?php $ownedBy  = ($visit->full_name) ? $visit->full_name : $visit->company_name  ?>
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="row">
                            </div>
                            <div class="row"> 
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <i class="text-center badge badge-primary">Project Owner: </i>
                                        <i class="badge badge-secondary">{{ $ownedBy}}</i>
                                    </div>
                                    <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <i class="text-center badge badge-primary">Project Name: </i>
                                        <i class="badge badge-secondary">{{ $visit->project_name}}</i>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                    <i class="text-center badge badge-primary">Last Date Visited: </i>
                                        <i class="badge badge-secondary">
                                            {{ old('vdate', date("l, jS F, Y", strtotime($visit->date_of_visit) )) }}
                                        </i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr />
    <div class="card-body">
        @foreach ($getAllVisit as $visit)
            <?php $encryptId = Crypt::encrypt($visit->vid) ?>
            <form class="mt-5" action="{{ route('onsite-visit.update', $encryptId) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" id="" value="PUT">
                    <div class="form-row">
                        <div class="col-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="title">Change Date of Visit </label>
                            <input type="text" id="vdate" name="vdate" class="form-control" data-toggle="modal" data-target=".bd-example-modal-sm"
                            value="" required >
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="update-image">Update Photos of Project Visit</label>
                            <input type="file" class="form-control" id="img_name" name="img_name[]" accept="image/*" multiple required>

                        </div>
                        <div class="form-group col-md-12 mt-4">
                                <textarea name="comments" id="comments" cols="30" rows="5" class="form-control" required dir="ltr">
                                    {{ old('comments', ($visit->comments)) }}
                                </textarea>
                            <label for="get-comment" class="float-right">Comments</label>
                        </div>
                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                    <div class="container">
                        <div class="row">
                        <div class="col-2"> </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                  Save Changes</button>
                              </div>
                              <div class="form-group col-md-2"></div>
                      </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>

        <!-- End -->

        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Modify Date of Visit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="date" id="mdate" name="mdate" class="form-control mb-3"
                            max="<?= gmdate("Y-m-d") ?>" >
                  </div>
                </div>
              </div>
        </div>

 @include('partials.footer')

 <script>
     (
         () => {
             let date_of_visit = document.getElementById("vdate");
             let modify_visit  = document.getElementById("mdate");

                if ( modify_visit ) {
                        modify_visit.addEventListener('change', () => {
                            date_of_visit.setAttribute("value", modify_visit.value)
                        });
                    }

         }
     )();
 </script>
