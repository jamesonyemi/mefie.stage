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
        <!--@include('partials.breadcrumb')-->

        <!-- End Breadcrumb Area -->
    <!-- Start -->
    <div class="mt-5 row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item col-sm-6 col-md-4 col-lg-4" >
              <a class="nav-link active" id="completed-project-tab" data-toggle="tab" href="#completed-project" role="tab" aria-controls="completed-project" aria-selected="true" data-value="completed">
                <div class="my-4 stats-card-box">
                    <div class="icon-box bg-success">
                        <i class='bx bxs-briefcase-alt-2'></i>
                    </div>
                        <div class="row">
                            <div class="text-secondary">
                            <span class="ml-2 text-center" id="complete">Completed Projects</span>
                            </div>
                            <div class="col-2">
                                <sup> 
                                    <span style="font-size: 1rem" class="badge badge-success rounded-pill">
                                        {{ $completed_count }}
                                    </span> 
                                 </sup>
                                 <span id="show-complete"></span>
                            </div>
                        </div>
                    </div>
              </a>
            </li>
            <li class="nav-item col-sm-6 col-md-4 col-lg-4">
              <a class="nav-link" id="ongoing-project-tab" data-toggle="tab" href="#ongoing-project" role="tab" aria-controls="ongoing-project" aria-selected="false" data-value="ongoing" data-value="completed">
                <div class="my-4 stats-card-box">
                        <div class="row">
                            <div class="text-secondary">
                            <span class="ml-2 text-center">Ongoing Projects</span>
                            </div>
                            <div class="col-3">
                                <sup> 
                                    <span style="font-size: 1rem"class="badge badge-primary rounded-pill">
                                        {{ $ongoing_count }}
                                    </span> 
                                 </sup>
                            </div>
                            </div>
                    <div class="icon-box bg-primary">
                        <i class='bx bx-briefcase-alt-2'></i>
                    </div>
                </div>
              </a>
            </li>
            <li class="nav-item col-sm-6 col-md-4 col-lg-4">
              <a class="nav-link" id="cancelled-project-tab" data-toggle="tab" href="#cancelled-project" role="tab" aria-controls="cancelled-project" aria-selected="false" data-value="cancelled">
                <div class="my-4 stats-card-box">
                    <div class="icon-box bg-danger">
                        <i class='bx bx-briefcase-alt-2'></i>
                    </div>
                        <div class="row">
                            <div class="text-secondary">
                            <span class="ml-2 text-center">Cancelled Projects</span>
                            </div>
                            <div class="col-2">
                                <sup> 
                                    <span style="font-size: 1rem"class="badge badge-danger rounded-pill">
                                        {{ $cancelled_count }}
                                    </span> 
                                 </sup>
                            </div>
                        </div>
                </div>
              </a>
            </li>
            <li class="nav-item col-sm-12 col-md-4 col-lg-4">
              <a class="nav-link" id="stalled-project-tab" data-toggle="tab" href="#stalled-project" role="tab" aria-controls="stalled-project" aria-selected="false" data-value="stalled">
                <div class="my-4 stats-card-box">
                    <div class="icon-box bg-secondary">
                        <i class='bx bx-briefcase-alt-2'></i>
                    </div>
                        <div class="row">
                            <div class="text-secondary">
                            <span class="ml-2 text-center">Stalled Projects</span>
                            </div>
                            <div class="col-2">
                                <sup> 
                                    <span style="font-size: 1rem"class="badge badge-secondary rounded-pill">
                                        {{ $stalled_count }}
                                    </span> 
                                 </sup>
                            </div>
                        </div>
                </div>
              </a>
            </li>
          </ul>
    </div>
   
    <div class="tab-content">
        <div class="tab-pane active" id="completed-project" role="tabpanel" aria-labelledby="completed-project-tab">@include('reports.completed_projects')</div>
        <div class="tab-pane" id="ongoing-project" role="tabpanel" aria-labelledby="ongoing-project-tab">@include('reports.ongoing_projects')</div>
        <div class="tab-pane" id="cancelled-project" role="tabpanel" aria-labelledby="cancelled-project-tab">@include('reports.cancelled_projects')</div>
        <div class="tab-pane" id="stalled-project" role="tabpanel" aria-labelledby="stalled-project-tab">@include('reports.stalled_projects')</div>
    </div>
    
        
    <img src="{{ asset('assets/img/welcome.jpg') }}" class="mt-5"  lazy="loading"  />
    <!-- End -->
    
    
  @include('partials.footer')
  





