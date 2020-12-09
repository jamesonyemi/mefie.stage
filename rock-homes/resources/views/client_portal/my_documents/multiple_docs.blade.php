@include('partials.client-portal.master_header')
<!-- Main Content Wrapper -->
    <!-- Begin page -->
    <div id="layout-wrapper" style="margin-top:100px;">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div>
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">My Documents</h4>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>   
                                    <table id="" class="table table-bordered dt-responsive nowrap my-projects" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Title</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientProject as $project)
                                            <?php $encryptId = Crypt::encrypt($project->pid) ?>
                                            @if ( $project->status === "ongoing" || $project->status !== "" )
                                            <tr>
                                                <td id="client_ids"></td>
                                                <td >
                                                    <a href=" {{ route('my-documents.show',  $encryptId)}}" 
                                                       class="d-inline-block nav-link mr-2"  style="font-size:1.05rem;">
                                                    {{ ucwords($project->title) }}
                                                     </a>
                                                </td>
                                                <td> 
                                                <div class="row">
                                                    <span class="col-1 text-center" style="font-size:1.05rem;">{{ ucwords($project->location) }}
                                                    </span>
                                                </div>
                                                </td>    
                                            </tr>
                                             @endif
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
@include('partials.client-portal.footer')
