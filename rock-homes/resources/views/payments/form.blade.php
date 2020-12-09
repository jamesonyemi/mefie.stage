@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-4 mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>New Payment</h3>
            </div>
            <hr>
            <div class="card-body">
                <form class="mt-4" action="{{route('payments.store') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="client">Client</label>
                            <select id="clientid" name="clientid" class="form-control custom-select selectpicker" data-live-search="true" required >
                                <option value="">---select---</option>
                                 @foreach ($all_clients as $item)
                                 <option value="{{ $item->id }}" class="text-capitalize">
                                     {{ ucwords( $item->client_name)  }}
                                 </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="pid">Project:</label>
                            <select id="pid" name="pid" class="required form-control" required></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_region">Amount Received:</label>
                            <input type="number" step="0.1" id="amt_received" name="amt_received" class="form-control" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="rfrom">Received From:</label>
                            <input type="text"  id="receivedfrom" name="receivedfrom" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="paymode">Payment Mode:</label>
                            <select id="paymentmode" name="paymentmode" class="form-control custom-select" required>
                                <option value="">--select--</option>
                                @foreach ($paymode as $key => $item)
                                <option value="{{ $key }}"> {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Payment Date (format-- mm/dd/yy):</label>
                        <input type="date" id="paymentdate" name="paymentdate" value="{{ date('Y-m-d') }}" max="{{date('Y-m-d') }}" class="form-control" required>
                            <span class="badge badge-pill badge-danger" id="error-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                            <span class="badge badge-pill badge-success" id="success-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="pwd">Select Project Stage.</label>
                            <div class="row">
                            <div class="col-12">
                            <select id="project-stage" name="stage_id" class="form-control custom-select selectpicker " required data-live-search="true">
                                <option value="">----Select Stage----</option>
                                @foreach ($stages as $key => $stage)
                                <option value="{{ $stage }}" class="">{{ ucwords($key)  }}</option>
                                @endforeach
                            </select>

                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="cheque-no">Description:</label>
                            <textarea name="comments" id="comments" cols="30" rows="2" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="form-row" id="bank">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4" >
                            <label for="bank-name">Bank Name:</label>
                            <input type="text" id="bankname" name="bankname" class="form-control" >
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Bank Branch:</label>
                            <input type="text" id="bankbranch" name="bankbranch" class="form-control" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4 cheque-no">
                            <label for="cheque-no">Cheque Number:</label>
                            <input type="text" id="chequeno" name="chequeno" class="form-control" >
                        </div>
                        <div class="form-group col-md-2 hide-me"></div>
                        <div class="form-group col-md-4">
                            
                        </div>
                    </div>
                     <hr style="background-color:fuchsia; opacity:0.1" class="mt-5">
                      <div class="container mb-4">
                          <div class="row">
                        <div class="col-2"></div>
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                   Save</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>

            </div>
        </div>
<div class="mt-5"></div>
        <!-- End -->
 @include('partials.footer')
 @include('partials.payment_mode_toggle')
