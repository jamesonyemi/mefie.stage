@include('partials.client-portal.master_header')
<style>

.font-rem {
   font-size:1rem;
}

</style>
    <!-- Begin page -->
    <div id="layout-wrapper" style="margin-top:100px;">   
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div>
            <div class="page-content">
                <div class="container-fluid">

                    <!-- FILTERING BY PROJECT STATUS  -->
                    {{-- <div><span id="filter_status"></span></div> --}}
                    <!-- END OF FILTERING BY PROJECT STATUS-->
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">Client Project Payment BreakDown </h4>
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="" class="table table-bordered dt-responsive nowrap my-payment" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Project Title</th>
                                                <th>Owner</th>
                                                <th>Estimated Budget
                                                    <i class="" style="font-size: 12px; font-weight:bold">(GH₵)</i>
                                                </th>
                                                <th>Active</th>
                                                <th>Created On</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            @foreach ($client_payments as $key => $payment)
                                                <?php $encryptId = Crypt::encrypt($payment->pid) ?>
                                            <tr>
                                                <td class="col-sm-4"></td>
                                                <td >
                                                    <a  href="{{ route('my-payments.show', $encryptId ) }}" class="nav-link font-rem" id="del-modal">
                                                        {{ $payment->project_name }}
                                                    </a>
                                                </td>
                                                <td >
                                                    <a  href="{{ route('my-payments.show', $encryptId ) }}" class="nav-link font-rem text-primary" id="del-modal">
                                                        {{ $payment->client_name }}
                                                    </a>
                                                </td>
                                                <td class="col-1 text-center font-rem" >{{ number_format($payment->estimated_budget, 2) }}</td>
                                                <td class="col-1 text-center font-rem">{{  strtoupper($payment->active) }}</span></td>
                                                <td class="col-1 text-center font-rem">{{ date('l, jS F, Y', strtotime($payment->created_at))  }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                     <!-- Pagination-Counter-Start -->
                                    <div class="col-md-6">
                                        <nav>
                                            {{-- <ul class="pagination justify-content-start"> Page {!! ( $data["currentPage"] ) !!} of {!! $data["total"] !!} </ul> --}}
                                        </nav>
                                    </div>
                                     <!-- Pagination-Counter-End -->

                                    <!-- Pagination-Start -->
                                    <div class="col-md-6">
                                        <nav> 
                                            <ul class="pagination justify-content-end">{!! $client_payments->links() !!} </ul>
                                        </nav>
                                    </div>
                                    <!-- Pagination-End -->
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

    <script>
        $(document).ready(function() {
          let cTable = $('table.my-payment').DataTable({
                "scrollCollapse": true,
                "paging": true,
                "dom": 'Bfrtip',
            "lengthMenu": [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
                ],
            "buttons": [
            { "extend": 'pdf', "button": '' },
            { "extend": 'csv', "button": ''},
            { "extend": 'excel', "button": '' },
             "pageLength"
            ],
                "info": true,
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "className": 'select-checkbox',
                    "targets":   0

                } ],
                "select": {
                    "style":    'os',
                    "selector": 'td:first-child'
        },

                "order": [[ 1, 'asc' ]],
          });
        
          
        } );
        
        </script>
   


