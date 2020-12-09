<fieldset class="border p-2 mt-3" style="border-color: #007bff !important;">
    <legend  class="w-auto btn btn-outline-primary text-uppercase" >Client Leader Board</legend>
    <div class="card-deck mb-30" style="margin-top: 10px">
        <div class="card p-0">
            <div class="card-body p-4">
                <h5 class="card-title font-weight-bold text-uppercase">Add New Client
                    <hr>
                    <div class="row" >
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="row">
                                <a href="{!!url('/admin-portal/clients/create/cc-form') !!}">
                                    <button type="button" class="btn btn-outline-primary">
                                        Corporate
                                    </button>
                                </a>
                            </div>
                            <div class="col-1"></div>
                            <div class="row">
                                <a href="{!!url('/admin-portal/clients/create/ic-form') !!}" style="margin-left: 15px;">
                                    <button type="button" class="btn btn-outline-primary">
                                        Individual
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        <div class="card p-0">
            <div class="card-body p-4">
                <h5 class="card-title font-weight-bold text-uppercase">All Corporate</h5>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <a href="{!!url('admin-portal/corporate-client-wnp') !!}">
                            <button type="button" class="btn btn-outline-primary col-lg-12">
                               Clients
                            </button>
                        </a>
                    </div>
                    </div>
                <hr>
            </div>
        </div>
        <div class="card p-0">
            <div class="card-body p-4">
                <h5 class="card-title font-weight-bold text-uppercase">All Individual</h5>
                <hr>
                <div class="row">
                <div class="col-12">
                    <a href="{!!url('admin-portal/client-wnp') !!}">
                        <button type="button" class="btn btn-outline-primary col-lg-12">
                           Clients
                        </button>
                    </a>
                </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
 </fieldset>