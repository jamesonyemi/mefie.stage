@include('partials.master_header')
@include('partials.breadcrumb')
    <!-- Start -->
@if( empty($project_owner)  )
    <h1>No Document Uploaded Yet</h1>
  @else
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card mb-30">
                <?php ?>
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="row">
                        <div class="col-12" >
                            <div class="list-group-item" style="background-color:#17a2b8">
                                <label class="font-weight-normal text-white">Project Name</label><br>
                                <div class="row">
                                    <h3 class="ml-3 font-weight-bold text-white">
                                        {{ ucwords($project_owner->project_name)}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-12 mt-2">
                            <div class="list-group-item" style="background-color:#6c757d">
                                <label class="font-weight-normal text-white">Project Owner</label><br>
                                <div class=row>
                                    <h3 class="ml-3 font-weight-bold text-white">
                                        {{ ucwords($project_owner->full_name)}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                             <div class="list-group-item" style="background-color:#fd7e14">
                                <label class="font-weight-normal text-white">Location</label><br>
                                <div class=row>
                                    <h3 class="ml-3 font-weight-bold text-white">
                                        {{ ucwords($project_owner->location) }}
                                        <i class="bx bx-arrow-to-right text-white"></i>
                                        {{ ucwords($project_owner->region) }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body"></div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Project Documents</h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <div class="card-title-desc">  </div>
                                <table id="" class="table table-bordered dt-responsive nowrap stage" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <td id="stage">#</td>
                                            <th>Category</th>
                                            <th>Document</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($owners as $owner)
                                        <?php  ?>
                                        <tr>
                                            <td class="mb-5"></td>
                                            <td  class="mb-5">
                                                {{ ucwords($owner->contract_type) }}
                                            </td>
                                            <td>
                                                @foreach (json_decode($owner->doc_link) as $doc)
                                                <a href="{{ asset('/rock-homes/public'.$doc) }}" class="nav-link" target="_blank">
                                                    <div class="row">
                                                            <span class="ml-1">  {!!  str_replace('/project-documents/', '', $doc ) !!}</span>
                                                        </div>
                                                    </a>

                                                @endforeach
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
        </div>
    </div>
     @endif
    <br><br><br>
    <!-- End -->
@include('partials.footer')