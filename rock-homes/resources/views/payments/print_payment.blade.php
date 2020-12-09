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
        <div >

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between mt-4">
                                <h4 class="mb-0 font-size-18">Print Payments</h4>
                                <div class="page-title-right">
                                <!--<a href="{{ route('stage-of-completion.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >-->
                                <!--    Add New Phase</a>-->
                                </div>
                            </div>
                            <div class="d-flex flex-column bd-highlight mt-4">
                              <div class="p-2 flex-fill bd-highlight">
                                <table >
                                    <tbody>
                                        <tr>
                                        <td>
                                         <select id="clientid" name="clientid" class="form-control custom-select selectpicker" data-live-search="true" required >
                                            <option value="">---select Client---</option>
                                             @foreach ($all_clients as $client)
                                             <option value="{{ $client->id }}" class="text-capitalize">
                                                 {{ ucwords( $client->client_name)  }}
                                             </option>
                                            @endforeach
                                        </select>
                                        </td>
                                      </tr>
                                   </tbody>
                                </table>
                            
                              </div>
                              <div class="p-2 flex-fill bd-highlight">
                                   <table >
                                    <tbody>
                                        <tr>
                                        <td>
                                            <select id="pid" name="pid" class="form-control custom-select" required></select>
                                        </td>
                                      </tr>
                                   </tbody>
                                </table>
                              </div>
                              
                              <div class="p-2 flex-fill bd-highlight">
                                  <table >
                                    <tbody>
                                        <tr>
                                        <td>
                                            <select id="stage_id" name="stage_id" class="form-control custom-select selectpicker " required data-live-search="true">
                                          <option>---filter by project stage---</option>
                                            @foreach ($stages as $key => $stage)
                                                            <option value="{{ $key }}" class="">{{ ucwords($key)  }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                      </tr>
                                   </tbody>
                                </table>
                              </div>
                            </div>
                           
                    <div class="bd-example mt-4 mb-2">
                      <div class="d-flex flex-wrap bd-highlight">
                        <div class="mr-auto p-2 bd-highlight">
                            <label id="ts-name">
                              <span class="d-flex align-items-center">Client</span>
                                  <span id="client-name" class="text-info h4 text-capitalize"></span>
                             </label>
                        </div>
                        <div class="p-2 bd-highlight">
                           <label class="">
                                  <span class="d-flex align-items-center">
                                      Total Cost 
                                  </span>
                                  
                                    <span class="row" >
                                       <span class="text-info mr-1"  id="currency-symbol"> GHC </span>
                                    <span id="total-cost" class="text-info h4"></span>
                                    </span>
                                  
                            </label>
                        </div>
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
                                    <table id="" class="table table-bordered dt-responsive nowrap payment-per-view" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Stage</th>
                                                <th>Amount Received (GHC)</th>
                                                <th>Project</th>
                                                <th>Owner</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($print_payment as $stage)
                                            <?php 
                                            
                                            $encrypt_project_id = Crypt::encrypt($stage->pid) ;
                                            
                                            $encrypt_project_phase_id = Crypt::encrypt($stage->phase_id) ;
                                            
                                            $encrypt_client_id = Crypt::encrypt($stage->clientid) ;
                                            
                                            $redirect_url = route('payment-per-stage-of-completion', [  $encrypt_project_id, $encrypt_client_id,$encrypt_project_phase_id ] )
                                            
                                            ?>
                                            <tr>
                                                <td id="pay-per-stage"></td>
                                                <td >
                                                    <span class="badge badge-pill badge-primary">
                                                        {{ ucwords($stage->phase) }}
                                                    </span>
                                                </td>
                                                <td style='text-align:left'>
                                                    <span class="badge badge-pill badge-primary">
                                                        {{ ucfirst( number_format($stage->amt_received, 2 )) }}</span>
                                                    </td>
                                                <td>{{ $stage->pid }}</td>
                                                <td>{{ $stage->clientid }}</td>
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
@include('partials.onsite_dynamic_dropdown')
@include('partials.filter_payment')



