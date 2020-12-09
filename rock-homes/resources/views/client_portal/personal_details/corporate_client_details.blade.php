@include('partials.client-portal.master_header')
        <!-- Start -->
        <div class="card mb-30 mt-lg-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Personal Details</h3>
            </div>
           
            <div class="card-body">
            <form class="" action="#" method="#">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="first_name">Full Name</label>
                        <input type="text" class="form-control list-group-item" name="first_name" id="first_name" 
                            value="{!! $corporate_clients->company_name !!}" disabled>        
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="middle_name">Client Primary Phone</label>
                        <input type="text" class="form-control list-group-item" name="primary_contact" id="primary_contact"
                            value="{!! $corporate_clients->phone1 !!}" disabled >        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="email">Primary Email</label>
                        <input type="email" class="form-control list-group-item" name="email" id="email" value="{!! $corporate_clients->email !!}" disabled>  
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="nat">Posta Address</label>
                            <input type="text" class="form-control list-group-item" name="Nationality" value="{!! $corporate_clients->postal_addr !!}" disabled>  
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="dob">Alternative Email</label>
                            <input type="text" class="form-control list-group-item" name="dob" value="{!! $corporate_clients->secondary_email !!}" disabled>
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="kin">Residential Address</label>
                            <input type="text" class="form-control list-group-item" name="nkin" value="{!! $corporate_clients->res_addr !!}" disabled>  
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="kin">Created On</label>
                            <input type="text" class="form-control list-group-item" name="nkin" 
                                value="{!! date("l, jS F, Y", strtotime($corporate_clients->created_at )) !!}" disabled>  
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="rel-kin">Last Updated</label>
                            <input type="text" class="form-control list-group-item" name="rel-kin" 
                                value="{!! date("l, jS F, Y", strtotime($corporate_clients->updated_at)) !!} " disabled>
                        </div>
                    </div><br><br>
                </form>
            </div>
        </div>
        <!-- End -->
        <div class="flex-grow-1"></div>
 @include('partials..client-portal.footer')
</div>

