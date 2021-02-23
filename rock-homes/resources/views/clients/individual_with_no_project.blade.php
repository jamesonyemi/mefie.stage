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
                            <h4 class="mb-0 font-size-18 text-uppercase">All Individual Clients
                                <sup><span class="badge badge-success text-lowercase">active</span></sup>
                            </h4>
                            <div class="page-title-right">
                                <a href="{!! url()->previous()!!}" class="btn btn-outline-primary btn-sm waves-effect waves-light" >Back</a>
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
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientWithZeroProject as $item)
                                        <?php $encryptId = Crypt::encrypt($item->clientid) ?>
                                        <tr>
                                            <td id="client_id"></td>
                                            <td style='text-align:left'>
                                                <a href=" {{ route('clients.show', $encryptId)}}" class="mr-2 nav-link text-capitalize">
                                                 {{ $item->fname ." ". $item->lname }}
                                                </a>
                                             </td>
                                            <td style='text-align:left'>
                                                <a href=" {{ route('clients.show', $encryptId)}}" class="mr-2 nav-link">
                                                {{ $item->email }}
                                                </a>
                                            </td>
                                            <td class="bx-sm">{{ $item->phone1 }}</td>
                                            <td>
                                            <a href="{{ route('clients.show', $encryptId)}}" class="mr-2 d-inline-block text-success" ><i class="bx bxs-analyse bx-sm"></i></a>
                                            <a href="{{ route('clients.edit', $encryptId) }}" class="mr-2 d-inline-block text-success" ><i class="bx bx-edit bx-sm"></i></a>

                                            <a  href="{{ url('admin-portal/client-wnp/remove-data' ).
                                            '/'.$encryptId }}" class="d-inline-block text-danger bx-sm" id="del-modal"
                                            data-toggle="modal" data-target=".bd-example-modal-sm">
                                            <i class="bx bx-trash text-danger"></i>
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
<div style="margin-bottom: -50px;"></div>
@include('partials.footer')
@include('clients.remove_modal_form')

<script>
    let triggerModal = document.querySelectorAll("#del-modal");
    console.log(triggerModal);

    let FormControl  = document.querySelector("#deleteForm");
    triggerModal.forEach( el => {
        el.addEventListener('click', () => {
            console.log(el.getAttribute("href"));
            FormControl.setAttribute('action',el.getAttribute("href"))

        });

    });

</script>