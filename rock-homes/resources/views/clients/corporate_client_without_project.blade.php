@include('partials.master_header')
@include('partials.success_alert')

<!-- Begin page -->
 <div id="layout-wrapper">

     <!-- ============================================================== -->
     <!-- Start right Content here -->
     <!-- ============================================================== -->
     <div><br><br>
        <hr style="background-color:fuchsia; opacity:0.1">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18 text-uppercase">All Corporate Clients
                                <sup><span class="badge badge-success text-lowercase">active</span></sup>
                            </h4>
                            <div class="page-title-right">
                                <a href="{!! url()->previous()!!}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >Back</a>
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
                                <table id="" class="table table-bordered dt-responsive nowrap client" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($zeroProject as $item)
                                            <?php $encryptId = Crypt::encrypt($item->id) ?>
                                            @if ( !empty($item->company_name) || ($item->active === 'yes' && $item->isdeleted === 'no'))
                                        <tr>
                                            <td id="client_id"></td>
                                            <td style='text-align:left'>
                                                <a href=" {{ route('view-corporate-client', $encryptId)}}" class="nav-link mr-2">
                                                    {{ $item->company_name }}
                                                </a>
                                             </td>
                                            <td style='text-align:left'>
                                                <a href=" {{ route('view-corporate-client', $encryptId)}}" class="nav-link mr-2">
                                                {{ $item->primary_email }}
                                                </a>
                                            </td>
                                            <td>{{ $item->mobile }}</td>
                                            <td>
                                                <a href=" {{ route('view-corporate-client', $encryptId)}}" class="d-inline-block text-success mr-2">
                                                    <i class="bx bxs-analyse bx-sm"></i>
                                                </a>
                                                <a href="{{ route('edit-corporate-client', $encryptId) }}" class="d-inline-block text-success mr-2">
                                                        <i class="bx bx-edit bx-sm"></i>
                                                    </a>
                                                <a  href="{{ route('delete-corporate-client',$encryptId) }}" id="show-modal" class="d-inline-block text-danger"
                                                data-toggle="modal" data-target=".bd-example-modal-sm">
                                                <i class="bx bx-trash text-danger bx-sm"></i>
                                                </a>
                                                
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
@include('clients.delete_modal')
<div style="margin-bottom: -50px;"></div>
@include('partials.footer')
@include('clients.delete_action_modal')
