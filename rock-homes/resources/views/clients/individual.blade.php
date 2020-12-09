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
                            <h4 class="mb-0 font-size-18 text-uppercase">Individual Clients and their Projects
                                <sup><span class="badge badge-success text-lowercase">active</span></sup>
                            </h4>
                            <div class="page-title-right">
                                <a href="{!! url()->previous()!!}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >Back</a>
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
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Project</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientWithProjects as $item)
                                        <?php $encryptId = Crypt::encrypt($item->clientid) ?>
                                        @if ( empty($item->cc_company_name))
                                        <tr>
                                            <td id="client_id"></td>
                                            <td style='text-align:left'>
                                                <a href=" {{ route('clients.show', $encryptId)}}" class="d-inline-block nav-link mr-2" >
                                                 {{ $item->full_name }}
                                                </a>
                                            </td>
                                            <td style='text-align:left'>
                                                <a href=" {{ route('clients.show', $encryptId)}}" class="d-inline-block nav-link mr-2" >
                                                    {{ $item->client_email }}
                                                </a>
                                            </td>
                                            <td> {!! $item->project_title !!}</td>
                                            <td>
                                                <a href=" {{ route('clients.show', $encryptId)}}" class="d-inline-block text-success mr-2" ><i class="bx bxs-analyse"></i></a>
                                                <a href="{{ route('clients.edit', $encryptId) }}" class="d-inline-block text-success mr-2" ><i class="bx bx-edit"></i></a>

                                                <a  href="{{ route('clients.destroy', Crypt::encrypt($item->pid)) }}" class="d-inline-block text-danger" id="del-modal"
                                                data-toggle="modal" data-target=".bd-example-modal-sm">
                                                <i class="bx bx-trash text-danger"></i>
                                                </a>
                                                @include('clients.remove_modal_form')
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
<div style="margin-bottom: -50px;"></div>
@include('partials.footer')

<script>
    let triggerModal = document.querySelectorAll("#del-modal");
    let FormControl  = document.querySelector("#deleteForm");
    triggerModal.forEach( el => {
        el.addEventListener('click', () => {
            console.log(el.getAttribute("href"));
            FormControl.setAttribute('action',el.getAttribute("href"))

        });

    });


</script>
