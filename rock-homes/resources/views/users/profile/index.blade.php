@include('partials.master_header')
<!-- Begin page -->
<br><br><br>
<div id="layout-wrapper">
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @include('partials.success_alert')
       <!-- Start Profile Area -->
       <section class="profile-area">
        <div class="profile-header mb-30 animate__animated animate__slideInDown">
            <div class="user-profile-images">
                <img 
                    src="{{ asset('assets/img/profile-banner.jpg') }}" 
                    class="cover-image" 
                    alt="image" 
                    loading="lazy"
                  />
               
                 <div class="invisible upload-cover-photo">
                    <a href="#" hidden>
                        <i class='bx bx-camera text-danger'></i>
                        <span class="invisible">Update Cover Photo</span>
                    </a>
                </div>

                <div class="profile-image">
                    <img 
                        src="{{ empty(Auth::id()) 
                        ? asset('assets/img/user1.jpg') :
                        asset(config('app.rock_rel_path').Auth::user()->photo_url) }}" 
                        alt="user image" 
                        loading="lazy"
                   />

                    <div class="invisible upload-profile-photo">
                        <a href="#" ><i class='bx bx-camera'></i> <span>Update</span></a>
                    </div>
                </div>

                <div class="user-profile-text">
                    <h3>{{ Auth::user()->full_name }}</h3>
                    <span class="invisible d-block">{{ __("Job Title") }}</span>  
                </div>
            </div>
           
            <div class="user-profile-nav">
                <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true">
                            My Details
                        </a>
                      </li>
                </ul>
                
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 ">
                <div class="tab-content">
                    @include('users.profile.tab_fragments.tab_contents.settings_tab')
                </div>
        </div>
    </section>
    <!-- End Profile Area -->

    </div>
    <!-- END layout-wrapper -->
@include('users.import_users_modal')
@include('users.export_users_modal')
@include('partials.footer')