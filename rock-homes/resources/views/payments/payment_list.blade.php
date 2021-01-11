@include('partials.master_header')
@include('partials.success_alert')
    <!-- Begin page -->
    @if( $get_payments->isEmpty() )
        <span>No Data Available</span>
     @else
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        
        <div>

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="mt-5 row justify-content-sm-center">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mx-4 mb-0 text-sm justify-content-sm-center font-size-18">Payment BreakDown </h4>
                                <div class="page-title-right">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    @include('payments.payment_analysis')
                    
                    <!-- end page title -->

                    <!-- FILTERING BY PROJECT STATUS  -->
                    {{-- <div><span id="filter_status"></span></div> --}}
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
                                                <th>Paid On</th>
                                                <th>Amount <small>(GHC)</small></th>
                                                <th>Mode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($get_payments as $payment)
                                            <?php 
                                            $encryptId = Crypt::encrypt($payment->clientid);
                                            $encryptPaymentId = Crypt::encrypt($payment->id); 
                                            ?>
                                            <tr class="mt-2 mb-2">
                                                <td id="project_id"></td>
                                                <td >
                                                    {{ date('D, jS M, Y', strtotime($payment->paymentdate) )}}
                                                </td>
                                                <td>
                                       <a href="{{ route('track-payment-history', [ $encryptId, $encryptPaymentId ] )}}" class="mr-1 d-inline-block text-info" id="amt-info" 
                                                    style="text-decoration:none;" >
                                                        {{ number_format($payment->amt_received, 2) }}
                                                    </a>
                                                </td>
                                                <td>{{  ucwords($payment->paymentmode) }}</td>
                                                <td>
                                                    <a href=" {{ route('payments.show', $encryptId)}}" class="mr-2 d-inline-block text-success" >
                                                        <i class="bx bxs-analyse bx-sm"></i>
                                                    </a>
                                                    <a href="{{ route('payments.edit', $encryptId) }}" class="mr-2 d-inline-block text-success" >
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
        <!-- end main content-->

    </div>
        @endif
    <!-- END layout-wrapper -->
@include('partials.footer')

