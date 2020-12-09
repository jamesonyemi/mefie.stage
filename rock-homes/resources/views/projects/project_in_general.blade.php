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

   @include('partials.success_alert')

    <!-- Begin page -->
    <div id="layout-wrapper">


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="mt-5" >

            <div class="page-content">
                <div class="row mb-3">
                    <div class="col-10"></div>
                    <div class="row ml-4">
                        <a href="{!! url()->previous()!!}" class="rounded-pill btn-md waves-effect waves-light ml-2 nav-link" ><i class='bx bx-arrow-back'></i> 
                        <sapn class="text-sm">Back</sapn></a>
                    <div class="row ml-5">
                         <div class="text-uppercase text-center mt-2 font-weight-bold" >Projects Summary</div>
                    </div>        
                    </div>    
                </div><hr>
                <div class="container">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col col-12">
                            <div >
                                <div class="page-title-right">
                                    <!--<div class="row mb-2">-->
                                    <!--    <div class="row ml-2">-->
                                    <!--        <a href="{{ route('projects.create') }}" class="btn btn-outline-primary rounded-pill btn-md waves-effect waves-light mr-1" >-->
                                    <!--            Add New Project</a>-->
                                    <!--    </div>-->
                                    <!--    <div class="row ml-4">-->
                                    <!--        <a href="{{ route('projects.index') }}" class="btn btn-outline-primary rounded-pill btn-md waves-effect waves-light mr-4" >-->
                                    <!--            Individual Clients</a>-->
                                    <!--    </div>-->
                                    <!--    <div class="row">-->
                                    <!--        <a href="{{ route('corporate-client-wp') }}" class="btn btn-outline-primary rounded-pill btn-md waves-effect waves-light cmb-2 ml-4" >-->
                                    <!--            Corporate Clients</a>-->
                                    <!--    </div>    -->
                                    <!--    <div class="row ml-4">-->
                                    <!--        <a href="{{ route('project-list') }}" class="btn btn-outline-primary rounded-pill btn-md waves-effect waves-light cmb-2 ml-2" >-->
                                    <!--            All Projects</a>-->
                                    <!--    </div>-->
                                    <!--</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title-desc">  </div>
                                    <table id="" class="table table-bordered table-hover dt-responsive nowrap project" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project</th>
                                                <th>Owner</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($all_projects as $project)
                                            <tr>
                                                <td id="project_id"></td>
                                                <td> {{ ucfirst($project->project_title) }} </td>
                                                <td> {{ !empty($project->client_name) ? ucwords($project->client_name) : '' }} </td>
                                                <td>{{ $project->location . ' ('. $project->region .')'}}</span></td>
                                                @switch($project->client_project_status)
                                                        @case('ongoing')
                                                        <td id="status">
                                                            <span class=" badge badge-primary">
                                                                {{ ucfirst($project->client_project_status) }}
                                                            </span>
                                                        </td>
                                                            @break
                                                        @case('completed')
                                                        <td id="status">
                                                            <span class=" badge badge-success">
                                                            {{ ucfirst($project->client_project_status) }}
                                                            </span>
                                                        </td>
                                                            @break
                                                        @case('stalled')
                                                        <td id="status">
                                                            <span class=" badge badge-warning">
                                                                {{ ucfirst($project->client_project_status) }}
                                                            </span>
                                                        </td>
                                                            @break
                                                        @case('cancelled')
                                                        <td  id="status" >
                                                            <span class="badge badge-danger">
                                                                {{ ucfirst($project->client_project_status) }}
                                                            </span>
                                                        </td>
                                                            @break
                                                        @default
                                                    @endswitch
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@include('partials.footer')
