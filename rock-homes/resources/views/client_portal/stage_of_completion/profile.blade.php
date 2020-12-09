@include('partials.client-portal.master_header')
<!-- Main Content Layout -->
    <!-- Start Profile Area -->
    <section class="profile-area">
        <div class="profile-header mb-30">
            <div class="user-profile-images">
                <div class="row">
                    
                </div>
            </div>
            <div class="user-profile-nav">
                <img src=" {!! asset('assets/img/welcome-img.png') !!} " class="cover-image" alt="image" >  
            </div>
        </div>
        <div class="sub_title">
            
        </div>
        <br>
            <div class="row">
            <div class="col-md-6 grid-margin grid-margin-md-0 stretch-card">
                <div class="col-lg-12 col-md-12">
                    <div class="card mb-30 pt-2">
                        <div class="card-body activity-timeline-chart-box" style="position: relative;">
                            
                            <div class="activity-timeline-content">
                                <div class="card-header">
                                  <h3>Activity Timeline</h3> 
                                </div>
                                <ul>
                                    <li>
                                        <i class="bx bx-briefcase"></i>
                                        <span>Project</span>
                                        {!! !empty(($stageInfo)) ? ucfirst($stageInfo->title) : 'No Data Yet' !!}
                                    </li>
                                    <li>
                                        <i class="bx bx-map"></i>
                                        <span>Location</span>
                                        {!!  !empty(($stageInfo)) ? ucfirst($stageInfo->location) : 'No Data Yet' !!}
                                    </li>
                                    <li>
                                        <i class="bx bx-user"></i>
                                        <span>Owner</span>
                                        {!! ucfirst(Auth::user()->full_name) !!}
                                    </li>
                                    <li>
                                        <i class="bx bx-check-double"></i>
                                        <span>Status</span>
                                        {!! !empty(($stageInfo)) ? ucfirst($stageInfo->status) : 'No Data Yet' !!}
                                    </li>
                                </ul>
                            </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 932px; height: 450px;">
                                </div>
                            </div>
                            <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            </h4> 
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pt-1 pl-2">Amount Spent <small>(GHC)</small></th> 
                                        <th class="pt-1"> Materials</th>
                                        <th class="pt-1"> Details</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach ($singleProject as $item)
                                    <tr>
                                        <td class="py-1 pl-0">
                                            <div class="d-flex align-items-center">
                                                 <div class="ml-3">
                                                     <p class="mb-0">{!! number_format($item->amtspent, 2) !!}</p> 
                                                    </div>
                                                </div>
                                            </td> 
                                            <td> {!! ucfirst($item->matpurchased) !!}</td>
                                            <td> {!! $item->amtdetails !!}</td>
                                        </tr> 
                                        
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-1"></div> --}}
                <div class="col-md-6 grid-margin grid-margin-md-0 stretch-card" >
                    <div class="card">
                    <p>Photos</p>
                    <div class="card-body text-center">
                    <div class="">
                        @include('client_portal.stage_of_completion.gallery')
                    </div> 
                </div>
            </div> 
            <div class="card mb-30 pt-3"style="position: relative; height: 80px;">
                <div class="card-body activity-timeline-chart-box" >
                <small>{{ config('app.name') }}</small>
                </div>
            </div>
    </div>
</div>
<br><br>
</section>
    <!-- End Profile Area -->
@include('partials.client-portal.footer')

