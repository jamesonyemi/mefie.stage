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
                                <h4 class="mb-0 font-size-18">All Onsite Visits</h4>
                                <div class="page-title-right">
                                
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
                                                <th>Date of Visit</th>
                                                <th>Site Visited</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                     @foreach ($getClientVisits as $visit)
                                     <?php $encryptId = Crypt::encrypt($visit->vid) ?>
                                      <?php $owner = ($visit->full_name) ? $visit->full_name : $visit->company_name ?>
                                            <tr>
                                                <td id="project_id"></td>
                                                <td>
                                                    <a href=" {{ route('onsite-visit.show', $encryptId)}}" class="nav-link mr-2" >
                                            {{ ucwords(date("l, jS F, Y", strtotime($visit->date_of_visit) )) }}
                                                    </a>
                                                </td>
                                              
                                                <td > {{ ucwords($visit->project_location ) }} </span></td>
                                                <td>
                                                    <a href=" {{ route('onsite-visit.show', $encryptId)}}" class="d-inline-block text-success mr-2  bx-sm" >
                                                        <i class="bx bxs-analyse bx-sm"></i>
                                                    </a>
                                                    <a href="{{ route('onsite-visit.edit', $encryptId) }}" class="d-inline-block text-success mr-2 bx-sm" >
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