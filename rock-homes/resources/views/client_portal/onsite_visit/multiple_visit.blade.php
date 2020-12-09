@include('partials.client-portal.master_header')
<!-- Main Content Wrapper -->
    <!-- Begin page -->
    <div id="layout-wrapper" style="margin-top:10%;">
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
                                <h4 class="mb-0 font-size-18">My Onsite Visits</h4>
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

                                    @if ( ($getVisits->isEmpty())  )
                                    <p>No Data Available</p>
                                    @else
                                    <table id="" class="table table-bordered dt-responsive nowrap my-projects" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Location Visited</th>
                                                <th>Landmark</th>
                                                <th>Comment</th>
                                                <th>Last Date Visited</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getVisits as $visit)
                                            <?php $encryptId = Crypt::encrypt($visit->vid) ?>
                                            @if ( $visit->status === "ongoing" )
                                            <tr>
                                                <td id="client_ids"></td>
                                                <td >
                                                    <a href=" {!! route('my-onsite-visit.show',  $encryptId) !!}"     class="d-inline-block nav-link mr-2" >
                                                    {{ $visit->project_location }}
                                                     </a>
                                                </td>
                                                <td>{{ $visit->landmark }}</td>    
                                                <td>{{ $visit->comments }}</td>    
                                                <td>{{ $visit->date_of_visit }}</td>    
                                            </tr>
                                             @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                   
                                    @endif

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
