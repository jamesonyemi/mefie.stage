
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div>
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="mt-4">
                        <div class="row mb-3">
                            <div class="col-10"></div>
                            <div class="row ml-4">
                                <a href="{!! url()->previous()!!}" class="rounded-pill btn-md waves-effect waves-light ml-2 nav-link" ><i class='bx bx-arrow-back'></i> 
                                <sapn class="text-sm">Back</sapn></a>
                            <div class="row ml-5">
                                 <div class="text-uppercase text-center mt-2 font-weight-bold" >Projects For Corporate Clients</div>
                            </div>        
                            </div>    
                        </div>       
                    </div>
                    <hr>
                    <br>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc divider">  </div>
                                    <table id="" class="table table-bordered dt-responsive nowrap corporate" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Company Name</th>
                                                <th>Primary Email</th>
                                                <th>Mobile</th>
                                                <th>Postal Addr.</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientWithProjects as $item)
                                            <?php $encryptId = Crypt::encrypt($item->id) ?>
                                            @if ( !empty($item->company_name) || ($item->active === 'yes' && $item->isdeleted === 'no'))
                                            <tr>
                                                <td id="corporate_ids"></td>
                                                <td style='text-align:left'>
                                                    <a href=" {{ route('view-corporate-client',$encryptId)}}" class="d-inline-block  mr-2 nav-link">
                                                     {{ $item->company_name }}
                                                    </a>
                                                    </td>
                                                <td style='text-align:left'>
                                                    {{ $item->primary_email }}
                                                </td>
                                                <td>{{ $item->mobile }}</td>
                                                <td>{{ $item->postal_addr }}</td>
                                                <td>
                                                    <a href=" {{ route('view-corporate-client',$encryptId)}}" class="d-inline-block text-success mr-2 bx-sm">
                                                        <i class="bx bxs-analyse"></i>
                                                    </a>
                                                    <a href="{{ route('edit-corporate-client',$encryptId) }}" class="d-inline-block text-success mr-2 bx-sm">
                                                        <i class="bx bx-edit"></i>
                                                        </a>
                                                    <a  href="{{ route('delete-corporate-client',$encryptId) }}" class="d-inline-block text-danger bx-sm" id="show-modal"
                                                        data-toggle="modal" data-target=".bd-example-modal-sm">
                                                        <i class="bx bx-trash text-danger"></i>
                                                        </a>
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
    @include('clients.remove_modal_form')
 @include('clients.delete_action_modal')