<style>
.bx-sm {
    font-size: 1.1rem!important;
    }
</style>

      <!-- Side Menu -->
        <!-- Start Sidemenu Area -->
        <div class="sidemenu-area">
            <div class="sidemenu-header">
                <a href=" {{ url('client-portal/dashboard') }} " class="navbar-brand d-flex align-items-center">
                <img src="{{ asset( config('app.app_logo') ) }}" alt="company logo">
                    <span></span>
                </a>
        
                <div class="burger-menu d-none d-lg-block">
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </div>
        
                <div class="responsive-burger-menu d-block d-lg-none">
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </div>
            </div>
        
            <div class="sidemenu-body">
                <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
                    <li class="nav-item-title">Pages</li>
        
                    <li class="{{ Request::url() == url('/client-portal/personal-details') ? 'nav-item mm-active' : 'nav-item' }}">
                        <a href=" {{ url('/client-portal/personal-details') }} " class="nav-link">
                            <span class="icon"><i class='bx bx-user-circle bx-sm'></i></span>
                            <span class="menu-title bx-sm">My Personal Details</span>
                        </a>
                    </li>
        
                    <li class="{{ Request::url() == url('/client-portal/my-projects') ? 'nav-item mm-active' : 'nav-item' }}">
                        <a href="{{ url('/client-portal/my-projects') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-briefcase-alt-2 bx-sm'></i></span>
                            <span class="menu-title bx-sm">My Projects</span>
                        </a>
                    </li>
                    <li class="{{ Request::url() == url('/client-portal/my-documents') ? 'nav-item mm-active' : 'nav-item' }}">
                        <a href="{{ url('/client-portal/my-documents') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-folder bx-sm'></i></span>
                            <span class="menu-title bx-sm">My Documents</span>
                        </a>
                    </li>
                    <li class="{{ Request::url() == url('/client-portal/my-onsite-visit') ? 'nav-item mm-active' : 'nav-item' }}">
                        <a href="{{ url('/client-portal/my-onsite-visit') }}" class="nav-link">
                            <span class="icon"><i class=' bx bx-building-house bx-sm'></i></span>
                            <span class="menu-title bx-sm">My OnSite Visits</span>
                        </a>
                    </li>
                    <li class="{{ Request::url() == url('/client-portal/my-payments') ? 'nav-item mm-active' : 'nav-item' }}">
                        <a href="{{ url('/client-portal/my-payments') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-sm'>₵</i></span>
                            <span class="menu-title bx-sm" style="padding-left:0.38rem;" >My Payments</span>
                        </a>
                    </li>
                    <li class="{{ Request::url() == url('/client-portal/my-stage-of-completion') ? 'nav-item mm-active' : 'nav-item' }}">
                        <a href="{{ url('/client-portal/my-stage-of-completion') }}" class="nav-link">
                            <span class="icon"><i class='bx bxs-news bx-sm'></i></span>
                            <span class="menu-title bx-sm">Stage</span>
                        </a>
                    </li>
                    <li class="{{ Request::url() == url('/client-portal/my-project-tracking') ? 'nav-item mm-active' : 'nav-item' }}">
                        <a href="{{ url('/client-portal/my-project-tracking') }}" class="nav-link" aria-expanded="true">
                            <span class="icon"><i class="bx bx-align-justify bx-sm"></i></span>
                            <span class="menu-title bx-sm">Tracking</span>
                        </a>
                    </li>
                    <li class="{{ Request::url() == url('/client-portal/my-user-settings') ? 'nav-item mm-active' : 'nav-item' }}">
                        <a href="{{ url('/client-portal/my-user-settings' ) }}" class="nav-link" aria-expanded="true">
                            <span class="icon"><i class="bx bx-user"></i></span>
                            <span class="menu-title">User Setting</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                          <span class="icon"><i class='bx bx-log-out'></i> </span>
                          <span class="menu-title">Logout</span>
                      </a>
                      <form id="logout-form" action="{{ route('corporate-client-logout') }}" method="GET" style="display: none;">
                                  {{ csrf_field() }}
                      </form>
                  </li>
                  <hr class="rounded-pill border border-gray mb-4" />
                     <li class="mr-5 col text-center">
                 @if ( !empty(Auth::user()->photo_url ) )
                        <div class="menu-profile img-responsive col-12 text-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset(config('app.rock_rel_path').Auth::user()->photo_url) }}" alt="logo" class="text-center">
                            <div class="row mt-4 text-center">
                                <div>
                                 <i class='bx bx-building-house' ></i>  
                                 {{ ucwords( Auth::user()->full_name ) }} 
                                 </div>
                                 <div class="mt-1">
                                 <i class='bx bx-phone-call'></i> 
                                 {{ ucwords( Auth::user()->contact_details) }}
                                 </div>
                            </div>
                        </div>
                @endif
                     </li>
                </ul>
            </div>
        </div>
    <!-- End Sidemenu Area -->
        
