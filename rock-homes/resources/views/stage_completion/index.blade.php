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

   @include('partials.success_alert')

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
@if ( count($all_clients) === 0 )
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>No data available yet. </strong> 
    </div>
   
@else
        
        <div>
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Summary of Project Phase</h4>
                                <div class="page-title-right">
                                <!--<a href="{{ route('stage-of-completion.create') }}" class="btn btn-outline-primary btn-sm waves-effect waves-light" >-->
                                <!--    Add New Phase</a>-->
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc divider">  </div>
                                    <table id="" class="table table-bordered dt-responsive nowrap stage" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Project</th>
                                                <th>Owner</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_clients as $client)
                                            <?php $encryptId = Crypt::encrypt($client->client_id) ?>
                                            <tr>
                                                <td id="stage"></td>
                                                <td style='text-align:left'>
                                                      {{ $client->project_name }}
                                                    </td>
                                                <td style='text-align:left'>
                                                    <a href=" {!! route('project-stage',$encryptId)!!}" class="mr-2 nav-link" >
                                                      {{ ucwords($client->full_name) }}
                                                    </a>
                                                    </td>
                                                
                                                <td>
                                                    <a href=" {!! route('stage-of-completion.show',$encryptId)!!}" class="mr-2 d-inline-block text-success" >
                                                        <i class="bx bxs-analyse bx-sm"></i>
                                                    </a>
                                                    <a href="{!! route('stage-of-completion.edit',$encryptId) !!}" class="mr-2 d-inline-block text-success" >
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
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        @endif
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@include('partials.footer')