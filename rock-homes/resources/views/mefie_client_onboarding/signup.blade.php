
    <div class="row">
        <div class="rounded back-to-home d-block d-md-block d-sm-block d-lg-block d-xl-block">
            <a href="{{ url('/') }}" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
        </div>
    </div>

        <!-- Hero Start -->
        <section class="bg-white cover-user">
            <div class="px-0 container-fluid">
                <div class="row no-gutters position-relative">
                    <div class="mr-0 col-sm-12 col-md-12 col-lg-4">
                        <div class="d-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="order-1 d-sm-none d-md-block col-lg-8 offset-lg-4 padding-less img" style="background-image:url('{{ asset('onboarding_assets/images/user/tongohills.jpg') }}')" data-jarallax='{"speed": 0.5}'></div>
                                    </div>
                                    <div class="border-0 card login_page">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                            <a class="logo" href="#">
                                                <img src="{{ asset('onboarding_assets/images/mefie_logo.png') }} " height="24" alt="">
                                            </a>
                                            
                                        </div>
                                        <h4 style="color: #202942;" class="mt-2 mb-4 text-center card-title">Signup</h4>
                                       <span><hr style="background-color: ##202942 !important;"></span>
                                            <form class="mt-4 login-form" action="{{ route('store-customer')  }}" method="POST" id="signup-form">
                                                @csrf
                                                @include('partials.validation_error')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group position-relative">
                                                            <label>Company Name <span class="text-danger">*</span></label>
                                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                                            <input type="text" class="pl-5 form-control" placeholder="company name" name="company_name" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group position-relative">
                                                            <label>Phone Number <span class="text-danger">*</span></label>
                                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                                            <input type="tel" class="pl-5 form-control" placeholder="phone" name="phone_number" id="phone" maxLength="15" required >
                                                            <span class="float-right" id="phone_number_status"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group position-relative">
                                                            <label>Your Email <span class="text-danger">*</span></label>
                                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                                            <input type="email" class="pl-5 form-control" placeholder="Email" name="email" required="">
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="form-group position-relative">
                                                            <label>Password <span class="text-danger">*</span></label>
                                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                                            <input type="password" class="pl-5 form-control" placeholder="Password" required name="password" id=password >
                                                            
                                                            <span class="float-right form-control-feedback" id="error">
                                                            </span>
                                                            <nav class="my-2 nav justify-content-start text-danger" id="errorInfo" style="display:none" >
                                                              <ol class="">
                                                                  <li class="">should contain at least one digit</li>
                                                                  <li class="">should contain at least one lower case</li>
                                                                  <li class="">should contain at least one upper case</li>
                                                                  <li class="">should contain at least 8 characters</li>
                                                              </ol>
                                                            </nav>
                                                        </div>
                                                    </div><!--end col-->

                                                    <!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="form-group position-relative">
                                                            <label>Package Selected <span class="text-danger">*</span></label>
                                                            <i data-feather="package" class="fea icon-sm icons"></i>
                                                            <input type="text"
                                                            value="{{ ucwords($pricing_plan->package_type) }}" class="pl-5 form-control" readonly  placeholder="" >

                                                            <input type="hidden"
                                                            name="pricing_plan_id"
                                                            value="{{ $pricing_plan->pricing_id }}" />

                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                id="customCheck1" name="tc"  >
                                         <label class="custom-control-label" for="customCheck1">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                        <button type="submit" id="btn-save" class="mt-2 btn btn-primary btn-lg btn-block" >Register</button>
                                                </div><!--end row-->
                                            </form>
                                            <div class="row justify-content-sm-center">
                                                <div class="mx-5 mt-4 mb-2">
                                                    <p class="mt-2 mb-0"><small class="mr-2 text-dark">Already have an account ?</small> <a href="{{ route('login') }}" class="text-dark font-weight-bold">Sign in</a></p>
                                                </div>
                                                 <div class="mx-5 mt-2 mb-4">
                                                    <p class="mb-0"><small class="mr-2 text-dark">Please help, I</small> <a href="{{ route('password.request') }}" class="text-dark text-primary font-weight-bold">Forgot password </a></p>
                                                 </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div> <!-- end about detail -->
                    </div> <!-- end col -->
                    <div class="order-1 d-none d-xl-block col-lg-8 offset-lg-4 padding-less img" style="background-image:url('{{ asset('onboarding_assets/images/user/tongohills.jpg') }}')" data-jarallax='{"speed": 0.5}'></div>
                    <!-- end col -->
                </div><!--end row-->
            </div><!--end container fluid-->
        </section><!--end section-->
        <!-- Hero End -->
