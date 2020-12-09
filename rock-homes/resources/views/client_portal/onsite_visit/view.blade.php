@include('partials.client-portal.master_header')
<!-- Main Content Layout -->
    <!-- Start Profile Area -->
    
    <section class="profile-area">
        <div class="profile-header mb-30">
            <div class="user-profile-images">
                <img src=" {!! asset('assets/img/profile-banner.jpg') !!} " class="cover-image" alt="image">
            </div>
            <div class="user-profile-nav"></div>
        </div>
        
        @foreach ($singleProject as $visit)
        <div class="row">
            <div class="col-lg-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                        <div class="row">
                            <div class="col-lg-4">
                                
                                <div class="card user-info-box mb-30">
                                    <div class="card-header d-flex justify-content-between align-visits-center">
                                        <h3>Other Info</h3>   
                                    </div>

                                    <div class="card-body">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex">
                                                <i class='bx bx-map mr-2'></i>
                                                <span class="d-inline-block">Landmark <br> 
                                                    <a href="#" class="d-inline-block">{!! $visit->landmark  !!}</a>
                                                </span>
                                            </li>
                                            <hr>
                                            <li class="d-flex">
                                                <i class='bx bx-calendar mr-2'></i>
                                                <span class="d-inline-block">Project Created On <a href="#" class="d-inline-block">{!! date("D F j, Y", strtotime($visit->project_created_on))   !!}</a></span>
                                            </li>
                                            <hr>
                                            <li class="d-flex">
                                                <i class='bx bx-briefcase mr-2'></i>
                                                <span class="d-inline-block">Project Name<a href="#" class="d-inline-block">{!! $visit->project_name !!}</a></span>
                                            </li>
                                            <hr>
                                            <li class="d-flex">
                                                <i class='bx bx-calendar mr-2'></i>
                                                <span class="d-inline-block">Date Of Visit<a href="#" class="d-inline-block">{!! date("D F j, Y", strtotime($visit->date_of_visit)) !!}</a></span>
                                            </li>
                                            <hr>
                                            <li class="d-flex">
                                                <i class='bx bx-stats mr-2'></i>
                                                <span class="d-inline-block">Project Status <br><a href="#" class="d-inline-block">
                                                 @switch($visit->status)
                                                    @case('completed')
                                                        <span class="badge badge-success">{!! ucfirst($visit->status) !!}</span>
                                                        @break
                                                    @case('cancelled')
                                                        <span class="badge badge-danger">{!! ucfirst($visit->status) !!}</span>
                                                        @break
                                                    @case('stalled')
                                                        <span class="badge badge-warning">{!! ucfirst($visit->status) !!}</span>
                                                        @break
                                                    @default
                                                    <span class="badge badge-info">{!! ucfirst($visit->status) !!}</span>
                                                @endswitch
                                                </a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="timeline-story-content">
                                    <div class="card mb-30">    
                                        <div class="card-header d-flex justify-content-between align-visits-center">
                                            <div class="timeline-story-header d-flex align-visits-center">
                                                <div class="info ml-3">
                                                    <h3>Comment</h3><br>
                                                    <span class="d-block">
                                                        <p class="mb-0">{!! $visit->comments !!}</p>
                                                        {!! date("F j, Y", strtotime($visit->date_of_visit)) !!} 
                                                        at {!! date("g:i a", strtotime($visit->time_of_visit)) !!} </span>
                                                </div>
                                            </div>

                                            {{-- <div class="dropdown">
                                                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class='bx bx-dots-horizontal-rounded' ></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-visit d-flex align-visits-center" href="#">
                                                        <i class='bx bx-show'></i> View
                                                    </a>
                                                    <a class="dropdown-visit d-flex align-visits-center" href="#">
                                                        <i class='bx bx-edit-alt'></i> Edit
                                                    </a>
                                                    <a class="dropdown-visit d-flex align-visits-center" href="#">
                                                        <i class='bx bx-trash'></i> Delete
                                                    </a>
                                                    <a class="dropdown-visit d-flex align-visits-center" href="#">
                                                        <i class='bx bx-printer'></i> Print
                                                    </a>
                                                    <a class="dropdown-visit d-flex align-visits-center" href="#">
                                                        <i class='bx bx-download'></i> Download
                                                    </a>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>

                                    <div class="card mb-30">
                                        <div class="card-header d-flex justify-content-between align-visits-center">
                                            <div class="timeline-story-header d-flex align-visits-center">   
                                                <div class="info ml-3">
                                                    <h3>Photos on Visit</h3>
                                                    <span class="d-block"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            @include('client_portal.onsite_visit.gallery')
                                            
                                            {{-- <div class="feedback-summary mt-4">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Like"><i class='bx bx-like'></i> 9898</a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Comment"><i class='bx bx-comment'></i> 898</a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Share"><i class='bx bx-share'></i> 354</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card user-events-box mb-30">
                    <div class="card-header d-flex justify-content-between align-visits-center">
                        <div class="">
                            Location <br>
                            <span class="badge badge-primary"> {!! $visit->project_location !!}</span><br><hr>
                            Project Owner <br>
                            <span class="badge badge-primary"> {!! $visit->full_name !!}</span><br><hr>
                        </div>
                    </div>

                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            @endforeach
            <nav class="col-sm-7">
                <ul class="pagination justify-content-end">
                    {{-- {!! $singleProject->links() !!} --}}
                </ul>
            </nav>
        </div>
    </section>

    <!-- End Profile Area -->
@include('partials.client-portal.footer')

