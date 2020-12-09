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
                                <h4 class="mb-0 font-size-18 text-capitalize">History of project Stage of Completion</h4>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card table-responsive">
                                <div class="card-body">
                                    <h4 class="card-title">{!! $get_project_name->title !!}</h4>
                                    <div class="card-title-desc">  </div>   
                                    @if ( ($getStageOfCompletion->isEmpty())  )
                                    <p>No Data Available</p>
                                    @else
                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap stage" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr> 
                                                <th>#</th> 
                                                <th>Phase</th>  
                                                <th>Location</th>
                                                <th>Amt. Spent <small>(GHC)</small></th>
                                                <th>Created</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getStageOfCompletion as $projectStage)
                                            <?php $encryptId = Crypt::encrypt($projectStage->stage_id) ?>
                                            @if ( $projectStage->status !== "" )
                                            <tr>
                                                <td></td>
                                                <td>
                                                     <a href=" {!! route('my-stage-of-completion.show',  $encryptId) !!}"     class="d-inline-block nav-link mr-2" >
                                                        {!! $projectStage->phase !!}
                                                    </a>
                                                    </td>
                                                <td >  {{ ucfirst($projectStage->location) }} </td> 
                                                <td>{!! number_format($projectStage->amtspent, 2) !!}</td>
                                                <td> {!! $projectStage->uploaded_date !!} </td>
                                            </tr>
                                             @endif
                                            @endforeach
                                            @endif
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
