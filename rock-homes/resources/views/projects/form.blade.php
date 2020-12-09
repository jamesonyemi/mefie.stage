@include('partials.header')
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


        <!-- Start -->

        <div class="card mb-5 mt-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Project Details</h3>
            </div>
            <hr>
            <div class="card-body">
                <form class="mt-5" action="{{route('projects.store') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="client">Client</label>
                                <select id="clientid" name="clientid" class="form-control custom-select" required>
                                    <option value="">---select---</option>
                            @foreach ($all_clients as $key => $client)
                            <?php $client_fullname = ucwords( ($client->client_name)) ?>
                            <option value="{{ $client->id }}" class="text-capitalize">
                                {!! !empty($client_fullname) ? $client_fullname : "" !!}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="project-title">Project Title</label>
                            <input type="text" class="form-control" id="title"
                            name="title" required>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="region">Region</label>
                            <select id="rid" name="rid" class="form-control custom-select" required>
                                <option value="">-- select --</option>
                            @foreach ($regions as $id => $region)
                                    <option value="{{ $id }}" class="text-capitalize">{{ ucwords($region)  }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-4">
                            <label for="town">Towns:</label>
                            <select id="tid" name="tid" class="form-control" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="other_landmark">Other Land Marks Close to Project</label>
                            <input type="text" class="form-control" id="landmark"
                                name="landmark" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Project Status </label>
                            <select id="statusid" name="statusid" class="form-control custom-select" required>
                                <option value="">-- select --</option>
                                @foreach ($project_status as $key => $status)
                                <option value="{{ $status }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="cost">Estimated cost of project</label>
                            <input type="number" step="0.1" class="form-control" id="totalcost"
                                name="totalcost" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="project-description">Project Description</label>
                            <textarea class="form-control" name="description" id="description"  required > </textarea>
                        </div>
                    </div>
                     <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col-1"></div>
                        <div class="form-group col-md-1"></div>
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                    Save Project</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
 @include('projects.region_town_dropdown')
