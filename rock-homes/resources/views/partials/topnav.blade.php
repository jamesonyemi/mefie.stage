<nav class="navbar top-navbar navbar-expand">
    <div class="collapse navbar-collapse" id="navbarSupportContent">
        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
        <ul class="navbar-nav left-nav align-items-center">
            {{-- <li class="nav-item">
                <a href="app/email/inbox.html" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Email">
                    <i class="bx bx-envelope"></i>
                </a>
            </li>

            <li class="nav-item">
                <a href="app/chat.html" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Message">
                    <i class="bx bx-message"></i>
                </a>
            </li>

            <li class="nav-item">
                <a href="app/calendar.html" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Calendar">
                    <i class="bx bx-calendar"></i>
                </a>
            </li>

            <li class="nav-item">
                <a href="app/todo.html" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Todo List">
                    <i class="bx bx-edit"></i>
                </a>
            </li>  --}}
            {{-- <li class="nav-item dropdown apps-box">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bxs-grid"></i>
                </a>

                <div class="dropdown-menu">
                    <div class="dropdown-header d-flex justify-content-between align-items-center">
                        <span class="title d-inline-block">Web Apps</span>
                        <span class="edit-btn d-inline-block">Edit</span>
                    </div>

                    <div class="dropdown-body">
                        <div class="flex-wrap d-flex align-items-center">
                            <a href="#" class="dropdown-item">
                                <img src="assets/img/icon-account.png" alt="image">
                                <span class="mb-0 d-block">Account</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <img src="assets/img/icon-google.png" alt="image">
                                <span class="mb-0 d-block">Search</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <img src="assets/img/icon-map.png" alt="image">
                                <span class="mb-0 d-block">Maps</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <img src="assets/img/icon-youtube.png" alt="image">
                                <span class="mb-0 d-block">YouTube</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <img src="assets/img/icon-playstore.png" alt="image">
                                <span class="mb-0 d-block">Play</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <img src="assets/img/icon-gmail.png" alt="image">
                                <span class="mb-0 d-block">Gmail</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <img src="assets/img/icon-drive.png" alt="image">
                                <span class="mb-0 d-block">Drive</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <img src="assets/img/icon-calendar.png" alt="image">
                                <span class="mb-0 d-block">Calendar</span>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown-footer">
                        <a href="#" class="dropdown-item">View All</a>
                    </div>
                </div>
            </li> --}}
        </ul>

        <form class="ml-auto nav-search-form d-none d-md-block">
            {{-- <label><i class="bx bx-search"></i></label>
            <input type="text" class="form-control" placeholder="Search here..."> --}}
        </form>

        <ul class="navbar-nav right-nav align-items-center">
            {{-- <li class="nav-item">
                <a class="nav-link bx-fullscreen-btn" id="fullscreen-button">
                    <i class="bx bx-fullscreen"></i>
                </a>
            </li> --}}

            {{-- <li class="nav-item dropdown language-switch-nav-item">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="assets/img/us-flag.jpg" alt="image">
                    <span>English <i class="bx bx-chevron-down"></i></span>
                </a>

                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>German</span>
                        <img src="assets/img/germany-flag.jpg" alt="flag">
                    </a>
                    <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>French</span>
                        <img src="assets/img/france-flag.jpg" alt="flag">
                    </a>
                    <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>Spanish</span>
                        <img src="assets/img/spain-flag.jpg" alt="flag">
                    </a>
                    <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>Russian</span>
                        <img src="assets/img/russia-flag.jpg" alt="flag">
                    </a>
                    <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>Italian</span>
                        <img src="assets/img/italy-flag.jpg" alt="flag">
                    </a>
                </div>
            </li> --}}

            {{-- <li class="nav-item message-box dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="message-btn">
                        <i class="bx bx-envelope"></i>
                        <span class="badge badge-primary">4</span>
                    </div>
                </a>

                <div class="dropdown-menu">
                    <div class="dropdown-header d-flex justify-content-between align-items-center">
                        <span class="title d-inline-block">4 New Message</span>
                        <span class="clear-all-btn d-inline-block">Clear All</span>
                    </div>

                    <div class="dropdown-body">
                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="figure">
                                <img src="assets/img/user1.jpg" class="rounded-circle" alt="image">
                            </div>

                            <div class="content d-flex justify-content-between align-items-center">
                                <div class="text">
                                    <span class="d-block">Sarah Taylor</span>
                                    <p class="mb-0 sub-text">UX/UI design</p>
                                </div>
                                <p class="mb-0 time-text">2 sec ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="figure">
                                <img src="assets/img/user2.jpg" class="rounded-circle" alt="image">
                            </div>

                            <div class="content d-flex justify-content-between align-items-center">
                                <div class="text">
                                <span class="d-block">Lucy Eva</span>
                                    <p class="mb-0 sub-text">Web developers</p>
                                </div>
                                <p class="mb-0 time-text">5 sec ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="figure">
                                <img src="assets/img/user3.jpg" class="rounded-circle" alt="image">
                            </div>

                            <div class="content d-flex justify-content-between align-items-center">
                                <div class="text">
                                <span class="d-block">James Anderson</span>
                                    <p class="mb-0 sub-text">Content whitter</p>
                                </div>
                                <p class="mb-0 time-text">3 min ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="figure">
                                <img src="assets/img/user4.jpg" class="rounded-circle" alt="image">
                            </div>

                            <div class="content d-flex justify-content-between align-items-center">
                                <div class="text">
                                <span class="d-block">Steven Smith</span>
                                    <p class="mb-0 sub-text">Digital marketing</p>
                                </div>
                                <p class="mb-0 time-text">7 min ago</p>
                            </div>
                        </a>
                    </div>

                    <div class="dropdown-footer">
                        <a href="#" class="dropdown-item">View All</a>
                    </div>
                </div>
            </li> --}}

            {{-- <li class="nav-item notification-box dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="notification-btn">
                        <i class="bx bx-bell"></i>
                        <span class="badge badge-secondary">5</span>
                    </div>
                </a>

                <div class="dropdown-menu">
                    <div class="dropdown-header d-flex justify-content-between align-items-center">
                        <span class="title d-inline-block">6 New Notifications</span>
                        <span class="mark-all-btn d-inline-block">Mark all as read</span>
                    </div>

                    <div class="dropdown-body">
                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="icon">
                                <i class="bx bx-message-rounded-dots"></i>
                            </div>
                            <div class="content">
                                <span class="d-block">Just sent a new message!</span>
                                <p class="mb-0 sub-text">2 sec ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="icon">
                                <i class="bx bx-user"></i>
                            </div>
                            <div class="content">
                                <span class="d-block">New customer registered</span>
                                <p class="mb-0 sub-text">5 sec ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="icon">
                                <i class="bx bx-layer"></i>
                            </div>
                            <div class="content">
                                <span class="d-block">Apps are ready for update</span>
                                <p class="mb-0 sub-text">3 min ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="icon">
                                <i class="bx bx-hourglass"></i>
                            </div>
                            <div class="content">
                                <span class="d-block">Your item is shipped</span>
                                <p class="mb-0 sub-text">7 min ago</p>
                            </div>
                        </a>

                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <div class="icon">
                                <i class="bx bx-comment-dots"></i>
                            </div>
                            <div class="content">
                                <span class="d-block">Steven commented on your post</span>
                                <p class="mb-0 sub-text">1 sec ago</p>
                            </div>
                        </a>
                    </div>

                    <div class="dropdown-footer">
                        <a href="#" class="dropdown-item">View All</a>
                    </div>
                </div>
            </li> --}}

             <li class="nav-item notification-box dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <div class="mr-4">
                        <span class="content d-flex justify-content-between align-items-center" style="margin-right:145px";>
                            <a href="#" class="navbar-brand d-flex align-items-center">
                               <img src="{{ asset( config('app.app_logo') ) }}" alt="company logo" class="hide-app-logo" style="display:none">
                        <span>
                    </span>
                </a>
                </span>
                </div>
                </a>
            </li> 

            <li class="nav-item dropdown profile-nav-item">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="menu-profile">
                        <span class="name">Hi {{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</span>
                        <img 
                            class="rounded-circle"
                            src="{{ empty(Auth::user()->photo_url) 
                                ? asset('assets/img/user1.jpg') :
                                asset(config('app.rock_rel_path').Auth::user()->photo_url) }}" 
                           alt="user image"
                             >
                    </div>
                </a>

                <div class="dropdown-menu">
                    @if( Auth::user()->role_id === config('app.admin') )
                    <div class="dropdown-body">
                        <ul class="p-0 pt-1 profile-nav">
                            <li class="nav-item">
                                <a href="{{ route('user-profile') }}" class="nav-link">
                                    <div>
                                    <span class="icon"><i class='bx bx-user bx-sm'></i></span>
                                    <span class="menu-title bx-sm">Profile</span>
                                    
                                </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    <div class="dropdown-footer">
                        <ul class="profile-nav">
                            <li class="nav-item">
                                  <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out'></i> <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>



