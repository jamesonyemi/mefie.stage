@include('partials.header')

    <!-- Side Menu -->
    <!-- Start Sidemenu Area -->
    @include('partials.side_menu')

    <!-- End Sidemenu Area -->

    <!-- Main Content Wrapper -->
    <div class="main-content d-flex flex-column">
        <!-- Top Navbar -->
        <!-- Top Navbar Area -->
        @include('partials.topnav')
        <!-- End Top Navbar Area -->

        <!-- Main Content Layout -->
        <!-- Breadcrumb Area -->
        @include('partials.breadcrumb')

        <!-- End Breadcrumb Area -->

        <!-- Start -->

        <h3>View Stage of Completion  </h3>
        <div class="card mb-30">
            <div class="d-flex justify-content-around mb-4">
                <div class="" >
                    <span class="h3">
                           <i class="badge badge-primary"> {{ ($r->title) ? $r->title : '' }} </i>
                    </span>
                    <p>
                        <i class="badge badge-default">Project Name</i>
                    </p>
                </div>
                <div class="" >
                        <span class="h3">
                           <i class="badge badge-primary"> {{ ($r->full_name) ? $r->full_name : $r->company_name  }} </i>
                           </span>
                           <p>
                            <i class="badge badge-default">Project Owner</i>
                           </p>
                </div>
                <div class="" >
                        <span class="h3">
                        @if( !empty($r->project_budget))
                            <i class="badge badge-primary">
                                <sup>GHC</sup>
                                {{ number_format($r->project_budget, 2) }}  </i>
                            @else
                                
                                <i class="badge badge-primary">
                                    Not Specified yet</i>
                            
                            @endif
                        </span>
                        <p>
                        <i class="badge badge-default">Project Budget</i>
                        </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-md-6 col-lg-12">
                    {{-- <label for="" style="float: right; clear: both;"> image preview</label> --}}
                </div>
                <div class="col-3"></div>
                <div class="col-md-6 col-lg-12">
                    
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="form-row mt-2">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                        <label for="comment">Region</label>
                        <input type="text" value="{{ strip_tags($r->region) }}" class="form-control"  disabled required>
                    </div>
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-4">
                        <label for="comment">Town</label>
                        <input type="text" value="{{ strip_tags($r->town)}}" class="form-control"  disabled required>
                    </div>
                </div>
                        <div class="form-row">
                            <div class="col-1"></div>
                            <div class="form-group col-md-4">
                                <label for="amount_spent">Amount Spent</label>
                            <input type="number" step="0.1" value="{{ $r->amtspent }}" class="form-control" id="amtspent" disabled  name="amtspent" required>
                            </div>
                            <div class="form-group col-md-2">  </div>
                            <div class="form-group col-md-4">
                                <label for="status">Status of Completion</label>
                            <input type="text" id="status_id" value="{{ ucfirst(strip_tags($r->status)) }}" name="status_id"
                                class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col-1"></div>
                            <div class="form-group col-md-4">
                                <label for="comment">Materials Purchased</label>
                                <input type="text" value="{{ strip_tags($r->matpurchased) }}" class="form-control"  disabled required>
                            </div>
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">
                                <label for="comment">Details of Amount Spent</label>
                                <input type="text" value="{{ strip_tags($r->amtdetails)}}" class="form-control"  disabled required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-1"></div>
                            <div class="form-group col-md-4">
                            <label for="phase">Project Phase</label>
                            <input type="text" class="form-control" disabled  value="{{ $r->phase }}">
                            </div>
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">

                            </div>
                        </div>
                 <br>
            </div>
        </div>
     <!-- End -->

<!-- End Main Content Wrapper -->

@include('partials.footer')

{{-- <script>
   let images =  document.querySelectorAll("#db-images");
   let trashIcon =  document.querySelectorAll("#removes");
   images.forEach(element => {
    // console.log(element);
       trashIcon.addEventListener("click", function(){
           let imgs = document.querySelector("#db-images").remove();
           let removeIcon = document.querySelector("#removes").remove();
           console.log(element.values = 120);
        });

   });

</script> --}}
