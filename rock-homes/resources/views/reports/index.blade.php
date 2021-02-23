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
    <div class="mt-5 row" >
        <div class="col-lg-4 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box bg-success">
                    <i class='bx bxs-briefcase-alt-2'></i>
                </div>
                <a href="#" class="nav-link">
                    <div class="row">
                        <div class="text-secondary">
                        <span class="text-center">Completed Projects</span>
                        </div>
                        <div class="col-2">
                            <sup> 
                                <span style="font-size: 1rem"class="badge badge-success rounded-pill">
                                    {{ $completed_count }}
                                </span> 
                             </sup>
                        </div>
                        </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="stats-card-box">
                <a href="#" class="nav-link">
                    <div class="row">
                        <div class="text-secondary">
                        <span class="text-center">Ongoing Projects</span>
                        </div>
                        <div class="col-3">
                            <sup> 
                                <span style="font-size: 1rem"class="badge badge-primary rounded-pill">
                                    {{ $ongoing_count }}
                                </span> 
                             </sup>
                        </div>
                        </div>
                </a>
                <div class="icon-box bg-primary">
                    <i class='bx bx-briefcase-alt-2'></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box bg-danger">
                    <i class='bx bx-briefcase-alt-2'></i>
                </div>
                <a href="#" class="nav-link">
                    <div class="row">
                        <div class="text-secondary">
                        <span class="text-center">Cancelled Projects</span>
                        </div>
                        <div class="col-2">
                            <sup> 
                                <span style="font-size: 1rem"class="badge badge-danger rounded-pill">
                                    {{ $cancelled_count }}
                                </span> 
                             </sup>
                        </div>
                        </div>
                    </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box bg-secondary">
                    <i class='bx bx-briefcase-alt-2'></i>
                </div>
                <a href="#" class="nav-link">
                    <div class="row">
                        <div class="text-secondary">
                        <span class="text-center">Stalled Projects</span>
                        </div>
                        <div class="col-2">
                            <sup> 
                                <span style="font-size: 1rem"class="badge badge-secondary rounded-pill">
                                    {{ $stalled_count }}
                                </span> 
                             </sup>
                        </div>
                        </div>
                    </a>
            </div>
        </div>
    </div>
   
    <img src="{{ asset('assets/img/welcome.jpg') }}" class="mt-5"  lazy="loading"  />
    <!-- End -->
    
    @include('partials.footer')
    
