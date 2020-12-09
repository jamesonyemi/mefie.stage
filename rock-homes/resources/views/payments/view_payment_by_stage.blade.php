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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between mt-4 ">
                                <h4 class="mb-0 font-size-18"></h4>
                                <div class="page-title-right">
                                <!--<a href="{{ route('stage-of-completion.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >-->
                                <!--    Add New Phase</a>-->
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <!-- end page title -->
                    <div class="page-title-box d-flex align-items-center justify-content-between mb-4 mt-4">
                            <h4 class="mb-0 font-size-18">View Payments</h4>
                            <div class="page-title-right">
                            <!--<a href="{{ route('stage-of-completion.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >-->
                            <!--    Add New Phase</a>-->
                            </div>
                    </div>
                    <hr>
                    <div class="bd-example mt-2 mb-2">
                      <div class="d-flex flex-wrap bd-highlight">
                        <div class="mr-auto p-2 bd-highlight">
                            <label>
                              <span class="d-flex align-items-center">Client</span>
                                  <span id="client-name" class="text-info h4">{{ $total_amount_received->client_name }}</span>
                             </label>
                        </div>
                        <div class="p-2 bd-highlight">
                           <label class="">
                                  <span class="d-flex align-items-center">Total cost of 
                                {{ ucwords($total_amount_received->phase) }} 
                                  </span>
                                  
                                    <span id="total-cost" class="text-info h4">
                                        GHC 
                                      {{ number_format($total_amount_received->total_cost, 2) }}
                                    </span>
                                  
                            </label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc divider">  </div>
                                    <table id="" class="table table-bordered dt-responsive nowrap payment-per-view" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Date</th>
                                                <th>Amount Received (GHC)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payment_per_stage as $payment)
                                            <?php $encryptId = Crypt::encrypt($payment->clientid) ?>
                                            <tr>
                                                <td id="pay-per-stage"></td>
                                                <td >
                                                   <a href=" {!! route('track-client-project', $encryptId)!!}" class="nav-link" >
                                                {{ date('l jS F Y', strtotime($payment->paymentdate) ) }}
                                              
                                                   </a>
                                                </td>
                                                <td style='text-align:left'>
                                                    <a href=" {!! route('track-client-project', $encryptId)!!}" class="nav-link" >
                                            {{ ucfirst( number_format($payment->amt_received, 2 )) }}
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
    <!-- END layout-wrapper -->
@include('partials.footer')
@include('partials.onsite_dynamic_dropdown')

<script>
    'use strict';
    $(document).ready(function ()
    {
        $('#pid').on('change', function(){
            var pID = $(this).val();
            if(pID)
            {
                $.ajax({
                    url : `{{ url('/admin-portal/cost-of-project' )}}/`+pID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                       $("#total-cost").text(numberWithCommas(data.total_cost));
                    }
                });
            }
            else
            {
                $('select[name="pid"]').empty();
            }
        });
        
        $('#clientid').on('change', function(){
            var clientID = $(this).val();
            if(clientID)
            {
                $.ajax({
                    url : `{{ url('/admin-portal/owner-of-project' )}}/`+clientID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                       $("#client-name").text( data.client_name);
                    }
                });
            }
            else
            {
                $('select[name="clientid"]').empty();
            }
        });
        
        
    });
    
    function numberWithCommas(...x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

</script>


<script>

    /* Custom filtering function which will search data in column  */
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            
            let stage = $('#stage_id').find(":selected").val();
            let owner = $('#clientid').find(":selected").val();
            let project = $('#pid').find(":selected").val();
            let stage_value = data[1];
            let client = data[4];
            let projectId = data[3];

     
            if (  ( stage || stage === stage_value )  )
            {
                return true;
            }
            
            if ( ( owner || owner === client)  )
            {
                return true;
            }
            
             if ( (  project === projectId )  )
            {
                return true;
            }
            
            return false;
        }
    );
     
$(document).ready(function() {
    let table = $('.table').DataTable();
     
    $('#stage_id').change( function() {
        table.search(this.value).order( [[ 2, 'desc' ]] ).draw();
    } );
    
   
    $('#pid').on( 'change', function () {
        table.columns( 3 ).search( this.value ).order( [[ 3, 'desc' ]] ).draw();
    } );
    
    
    $('#clientid').on( 'change', function () {
        table.columns( 4 ).search( this.value ).order( [[ 4, 'desc' ]] ).draw();
    } );
    
} );
</script>
