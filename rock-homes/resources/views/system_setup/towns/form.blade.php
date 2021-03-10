    @if ( $message = Session::get('info') )
    <div class="alert alert-info rounded-pill" role="alert" id="success-mgs">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif

        <!-- Start -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create Town</h5>
            <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modal-body">
        <div class="card mb-30">
            <div class="card-body">
                <form class="mt-5" action="{{route('towns.store') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="region">Region</label>
                            <select id="rid" name="rid" class="form-control custom-select" required>
                                <option value="">--select--</option>
                            @foreach ($regions as $id => $region)
                                    <option value="{{ $id }}" class="text-capitalize">{{ ucwords($region)  }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="town">Towns:</label>
                            <input type="text" id="town" name="town" autocomplete="off" class="form-control" required>
                            <div class="row">
                                <div class="col-10">
                                    <span id="signal-message"></span>
                                </div>
                                <div class="col-2">
                                    <div class="mt-2 ml-2 col-sm-1">
                                        <span id="signal-icon"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="status">Active</label>
                            <select id="active" name="active" class="form-control custom-select" required>
                                <option value="">--select--</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                     <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="float-right row">
                              <div class="text-center col">
                                  <button type="submit" class="btn btn-lg btn-primary " id="btn-save"><i data-feather="database"></i>
                                    Save</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

        <!-- End -->
 @include('system_setup.towns.town_js_script.validate_town')
