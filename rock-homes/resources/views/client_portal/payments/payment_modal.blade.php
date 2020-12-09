
<div class="card" style="margin-top: 7%; position: relative;">
    <div class="row" style="margin-bottom: 15px; position: relative;">
        <div class="col-md-10">
            <h4>Payment BreakDown</h4>
        </div>
        <div class="col-md-2">
            <div class="page-title-right">
                <a href="{!! url()->previous()!!}" class="btn btn-outline-primary btn-sm waves-effect waves-light" >Back</a>
             </div>
        </div>
    </div>
    <div class="card-body">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-6">
                         <h4 class="badge badge-secondary" style="font-size: 1rem; font-weight:bold">Project: {!!  is_null($get_project_name) ? "No Data availble" : $get_project_name->project_name !!}</h4> 
                        </div>
                    <div class="col-sm-6 col-md-12">
                        <h4 class="badge badge-secondary" style="font-size: 1rem; font-weight:bold">
                        Owned by: 
                        {!! Auth::user()->full_name !!}</h4>
                    </div>
                        <div class="row">
                            <div class="col-1"></div>
                                <i class="badge badge-secondary" style="font-size: 1rem; font-weight:bold">
                                    <span class="">Grand-total: 
                                      {!! !empty($client_total_payment->grand_total_payment) ? 'GH₵ '. number_format($client_total_payment->grand_total_payment, 2) : 'No Total Yet' !!}</span></i>
                           <div class="col-1"></div>
                        </div>
                </div>
            </div>
            <div class="modal-body">
              @foreach ($payments as $pay)
              <form id="deleteForm"  method="POST" >
                  {{ csrf_field() }}
                  <div class="form-row">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 text-center">
                                <span type="text" class="list-group-item" id="amount" name="amount" data-toggle="tooltip" data-placement="bottom" title="Amount" 
                                >  GH₵  {!!number_format($pay->amt_received, 2) !!}</span>
                            </div>
                            <div class="form-group col-md-4 text-center">
                                <span type="text" class="list-group-item" id="dob" name="dob" data-toggle="tooltip" data-placement="top" title="Disbursed for"
                                > {!! ucfirst($pay->disbursed_for) !!}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <span type="text" class="list-group-item" id="dob" name="dob" data-toggle="tooltip" data-placement="top" title="Payment Date" 
                                >{!!date("l F j, Y", strtotime($pay->paymentdate))  !!}</span>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                        @endforeach
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

