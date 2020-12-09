@include('partials.master_header')
<div class="row" style="margin-top: 5%; postion:fixed;">
    <h4 class="ml-3" >Corporate Client Details</h4>
 </div>
<div class="card mb-30 mt-4">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 mt-1"></div>
        <div class="row">
            <div class="col-md-7 col-sm-5">
                <a href="{!! url()->previous()!!}" class="btn btn-outline-primary btn-sm waves-effect waves-light" style="font-size:1rem;" >
                    Back</a>
            </div>
        </div>
    </div>
    <hr style="background-color:black; opacity:0.1">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-body">
            @foreach ($corporate as $client)
            <form class="mt-5">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                        <label for="c-name">Company Name</label>
                        <span class="list-group-item" id="company_name" name="company_name">
                            {!! old('company_name', $client->company_name) !!}</span>
                    </div>
                    <div class="form-group col-md-2">

                    </div>
                    <div class="form-group col-md-4">
                        <label for="c-mobile">Mobile Number</label>
                         <span class="list-group-item" id="mobile" name="mobile" >
                             {!! old('mobile', $client->mobile) !!}</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                        <label for="p-email">Primary Email</label>
                         <span class="list-group-item"  id="primary_email" name="primary_email" >
                             {!! old('primary_email', $client->primary_email) !!}
                         </span>
                        </div>
                            <div class="form-group col-md-2"> </div>
                    <div class="form-group col-md-4">
                        <label for="s-email">Secondary Email</label>
                         <span class="list-group-item" id="secondary_email" name="secondary_email" >
                             {!! old('secondary_email', $client->secondary_email) !!}
                             </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                        <label for="p-addr">Postal Address</label>
                         <span class="list-group-item"  id="postal_addr" name="postal_addr" >
                             {!! old('postal_addr', $client->postal_addr) !!}
                         </span>
                    </div>
                    <div class="form-group col-md-2">

                    </div>
                    <div class="form-group col-md-4">
                        <label for="fax">Fax</label>
                         <span class="list-group-item" id="fax"name="fax"  >
                             {!! old('fax', $client->fax) !!}
                         </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                          <label for="tel-no">Telephone Number</label>
                           <span class="list-group-item" id="tel_no" name="tel_no" >
                               {!! old('tel_no', $client->tel_no) !!}
                           </span>
                      </div>
                      <div class="form-group col-md-2"> </div>
                      <div class="form-group col-md-4">
                        <label for="res-addr">Residential Address</label>
                       <span class="list-group-item"  id="res_addr" > 
                       {!! old('res_addr',  $client->res_addr) !!} 
                       </span>
                    </div>
                  </div>
            </form>
            <br><br>
            @endforeach
        </div>
    </div>
</div>

@include('partials.footer')