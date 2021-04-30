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
@if( empty($all_projects)  )
    <h1>No Project Yet</h1>
  @else
   @include('partials.success_alert')

    <!-- Begin page -->
    <div id="layout-wrapper">


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="mt-5">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="row">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title-right ">
                                    <div class="container ">
                                    	<div class="row">
                                        <div class="col-10"></div>
                                        <div class="ml-4 row">
                                            <a href="{!! url()->previous()!!}" class="ml-2 rounded-pill btn-md waves-effect waves-light nav-link" ><i class='bx bx-arrow-back'></i> 
                                            <span class="text-sm">Back</span></a>
                                        <div class="ml-5 row">
                                             <div class="mt-2 text-center text-uppercase font-weight-bold" >Projects for Individual Client</div>
                                        </div>        
                                        </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <br>
                    <!-- end page title -->
                    <div class="container" style="margin-right: 12rem !important;">
                         <div class="container">
                           <div class="row">
                               <div class="" >
                                
                               </div>
                           </div>
                         </div> 
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                   {{-- FILTERING BY PROJECT STATUS --}}
                                    <div><span id="filter_status"></span></div>
                                    {{-- END OF FILTERING BY PROJECT STATUS --}}
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>
                                     <table id="" class="table table-bordered table-hover dt-responsive nowrap project" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Owner</th>
                                                <th>Project</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($clientWithProjects as $project)
                                            <?php $encryptId = Crypt::encrypt($project->pid) ?>
                                            <tr>
                                                <td id="project_id"></td>
                                                <td>
                                                    <a href="{{ route('projects.show',  $encryptId) }}" class="nav-link">
                                                        {{ !empty($project->client_name) ? $project->client_name : '' }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $project->project_title}}
                                                </td>
                                                <td>{{ $project->location . ' ('. $project->region .')'}}</td>
                                                @switch($project->client_project_status)
                                                        @case('ongoing')
                                                        <td id="status" class="text-primary">{{ ucfirst($project->client_project_status) }}</td>
                                                            @break
                                                        @case('completed')
                                                        <td id="status" class="text-success"  >{{ ucfirst($project->client_project_status) }}</td>
                                                            @break
                                                        @case('stalled')
                                                        <td id="status" class="text-warning">{{ ucfirst($project->client_project_status) }}</td>
                                                            @break
                                                        @case('cancelled')
                                                        <td id="status" class="text-danger" >{{ ucfirst($project->client_project_status) }}</td>
                                                            @break
                                                        @default
                                                    @endswitch
                                                <td>
                                                    <div class="col-lg-12">
                                                        <a href=" {{ route('projects.show',  $encryptId)}}" class="mt-1 mr-2 d-inline-block text-success bx-sm">
                                                            <i class="bx bxs-analyse"></i>
                                                        </a>
                                                        <a href="{{ route('projects.edit',  $encryptId) }}" class="mt-1 mr-2 d-inline-block text-success bx-sm">
                                                                <i class="bx bx-edit"></i>
                                                         </a>
                                                        <a  href="{{ route('projects.destroy', $encryptId ) }}" class="mt-1 d-inline-block text-danger" id="show-modal"
                                                            data-toggle="modal" data-target=".bd-example-modal-sm">
                                                            <i class="bx bx-trash text-danger bx-sm"></i>
                                                        </a>
                                                    </div>
                                                    </td>

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
    @endif
     @include('clients.remove_modal_form')
    <!-- END layout-wrapper -->
@include('partials.footer')
 @include('clients.delete_action_modal')
 