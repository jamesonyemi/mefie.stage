<fieldset class="p-2 mt-3 border" style="border-color: #007bff !important;">
    <legend  class="w-auto btn btn-outline-primary text-uppercase" >Client Leader Board</legend>
    <div class="card-deck mb-30" style="margin-top: 10px">
        <div class="p-0 card">
            <div class="p-4 card-body">
                <h5 class="card-title font-weight-bold text-uppercase">Add New Client
                    <hr>
                    <div class="mr-3 row justify-content-center" >
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="row">
                                <a href="{!!url('/admin-portal/clients/create/cc-form') !!}" class="mx-2 ml-0">
                                    <button type="button" class="btn btn-outline-primary">
                                        Corporate
                                    </button>
                                </a>
                            </div>
                            <div class="col-1"></div>
                            <div class="row">
                                <a href="{!!url('/admin-portal/clients/create/ic-form') !!}" class="float-right mx-2 ml-4">
                                    <button type="button" class="btn btn-outline-primary">
                                        Individual
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        
        <div class="p-0 justify-sm-content-center">
            <a href="{!!url('admin-portal/corporate-client-wnp') !!}" class="justify-content-center nav-link ">
            <div class="p-4 card-body btn btn-outline-primary bg-primary">
                <div class="row">
                    <div class="col-12">
                            <span type="button" class="text-white justify-content-center col-lg-12 h3" 
                            data-placement="bottom" title="List of corporate">
                               Corporate Clients
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            <div class="text-center footer">
                <small class="mx-5">List of corporate clients</small>
            </div>
            </div>
            <div class="p-0">
                <a href="{!!url('admin-portal/client-wnp') !!}" class="justify-content-center nav-link ">
                <div class="p-4 card-body btn btn-outline-secondary bg-danger ">
                    <div class="row">
                        <div class="col-12">
                                <span type="button" class="text-white justify-content-center col-lg-12 h3">
                                   Individual Clients
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="text-center footer -y-5">
                    <small class="mx-5">List of individual clients</small>
                </div>
                </div>
            </div>
        </fieldset>
        