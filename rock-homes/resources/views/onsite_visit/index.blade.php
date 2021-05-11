@include('partials.master_header')
@include('partials.breadcrumb')
<!-- Begin page -->
<br><br>
<div id="layout-wrapper">
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @include('partials.success_alert')
        <div >
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Visited Client Project</h4>
                                <div class="page-title-right">
                                    <a href="{{ url()->previous() }}" class="text-primary nav-link justify-content-center">
                                       <span class="icon"><i class="bx bx-log-out-circle bx-sm"></i></span>
                                       <span class="menu-title bx-sm">Back</span>   
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- end page title -->

                    <!-- FILTERING BY PROJECT STATUS  -->
                    <!-- END OF FILTERING BY PROJECT STATUS-->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>
                                    <table id="" class="table table-bordered dt-responsive nowrap client" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Owner</th>
                                                <th>Project</th>
                                                <th>Site Visited</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                     @foreach ($getAllVisit as $visit)
                                     <?php $encryptId = Crypt::encrypt($visit->client_id) ?>
                                      <?php $owner = ($visit->full_name) ? $visit->full_name : $visit->company_name ?>
                                            <tr>
                                                <td id="project_id"></td>
                                                <td>
                                                    {{ ucwords($owner) }}
                                                    
                                                </td>
                                              <td>
                                                    {{ ucwords($visit->project_name) }}
                                                    
                                                </td>
                                                <td > 
                                                <a href=" {{ route('project-visited', $encryptId)}}" class="mr-2 nav-link" >
                                                {{ ucwords($visit->location . " -- ". $visit->region) }} </a></td>
                                                <td>
                                                    <a href=" {{ route('project-visited', $encryptId)}}" class="mr-2 d-inline-block text-success bx-sm" >
                                                        <i class="bx bxs-analyse bx-sm"></i>
                                                    </a>
                                                    <a href="{{ route('onsite-visit.edit', $encryptId) }}" class="mr-2 d-inline-block text-success bx-sm" >
                                                            <i class="bx bx-edit bx-sm"></i>
                                                    </a>
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
                    <br><br>
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