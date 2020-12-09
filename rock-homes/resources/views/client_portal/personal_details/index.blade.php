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
                            value="{!! $individual_clients->full_name !!}" disabled>        
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="middle_name">Client Primary Phone</label>
                        <input type="text" class="form-control list-group-item" name="primary_contact" id="primary_contact"
                            value="{!! $individual_clients->phone1 !!}" disabled >        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                        <input type="email" class="form-control list-group-item" name="email" id="email" value="{!! $individual_clients->email !!}" disabled>  
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="nat">Nationality</label>
                            <input type="text" class="form-control list-group-item" name="Nationality" value="{!! $individual_clients->nationality !!}" disabled>  
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="dob">Date Of Birth</label>
                            <input type="text" class="form-control list-group-item" name="dob" value="{!! date("l, jS F, Y", strtotime($individual_clients->dob))  !!}" disabled>
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="kin">Next of Kin</label>
                            <input type="text" class="form-control list-group-item" name="nkin" value="{!! $individual_clients->nok !!}" disabled>  
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="rel-kin">Relationship to Next of Kin</label>
                            <input type="text" class="form-control list-group-item" name="rel-kin" value="{!! ucfirst($individual_clients->relationship) !!}" disabled>
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="kin">Phone Number of Next of Kin</label>
                            <input type="text" class="form-control list-group-item" name="nkin" value="{!! $individual_clients->nokphone !!}" disabled>  
                        </div>
                    </div><br><br>
                </form>
            </div>
        </div>
        <!-- End -->
        <div class="flex-grow-1"></div>
 @include('partials..client-portal.footer')
</div>

