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
    @include('partials.breadcrumb')
    <!-- End Breadcrumb Area -->


        <!-- Start -->

        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="row">
                        <div>
                            <span>
                                 <i class="badge badge-secondary bx-sm">Project Owner: {{  ucwords( $r->full_name)  }} </i>
                            </span>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
            <hr>
            <br><br>
            <div class="card-body">
                @foreach ($projectById as $project)
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_title">Project Title</label>
                            <span class="list-group-item bx-sm" id="title">{{ old('title', $project->title) }}</span>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                    <div class="form-group col-md-4">
                        <label for="validate_country">Region</label>
                        <div class="form-group">
                            @foreach ($regionId as $key => $value)
                                @if ( in_array($project->rid, [$key]) && $project->active === 'yes'  )
                                <div>
                                    <div class="form-group list-group-item col-12 bx-sm" >
                                        {{ ucwords($value) }}
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_country">Town</label>
                        @foreach ($townId as $key => $town)
                        @if ( in_array($project->rid, [$key]) && $project->active === 'yes'  )
                        <div>
                            <div class="form-group list-group-item col-12 bx-sm" >
                                {{ ucwords($town) }}
                            </div>
                        </div>
                        @endif
                    @endforeach

                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="other_landmark">Other Land Marks Close to Project</label>
                            <span class="list-group-item bx-sm">{{ old('title', $project->landmark) }}</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Current State of Project</label>
                            <div class="form-group">
                                @foreach ($project_status as $key => $status)
                                @if ( in_array($project->statusid,[$key]) )
                                    <div>
                                        <div class="form-group list-group-item col-12 bx-sm" >
                                            {{ ucwords($status) }}
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Total Cost of Project</label>
                            <span class="list-group-item bx-sm"> {{ ' GH₵ ' .  old('totalcost', number_format($project->totalcost, 2) ) }} </span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <!--<div class="form-group col-md-6"></div>-->
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Project Description</label>
                        <textarea class="form-control list-group-item" name="description" id="description"  disabled value="{{ old('description', $project->description) }}">
                            {{$project->description}}</textarea>
                        </div>
                    </div>
                      @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
  <!-- Footer -->
  <div class="flex-grow-1"></div>
@include('partials.footer')
<!-- End Main Content Wrapper -->
