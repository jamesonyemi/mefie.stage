
    <div class="row">
        <div class="rounded back-to-home d-none d-sm-block">
            <a href="{{ url('/') }}" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
        </div>

        <div class="my-5 rounded back-to-home d-none d-sm-block">
            <span><hr style="background-color: #fb5d13 !important;"></span>
            <p class="mt-2 mb-0"><small class="mr-2 text-dark">Already have an account ?</small> <a href="{{ route('login') }}" class="text-dark text-secondary font-weight-bold">Sign in</a></p>
        </div>
    </div>

        <!-- Hero Start -->
        <section class="bg-white cover-user">
            <div class="px-0 container-fluid">
                <div class="row no-gutters position-relative">
                    <div class="mr-5 col-4">
                        <div class="d-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="border-0 card login_page" style="z-index: 1">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                            <a class="logo" href="#">
                                                <img src="{{ asset('onboarding_assets/images/mefie_logo.png') }} " height="24" alt="">
                                            </a>
                                            <h4 style="color: #202942;" class="mt-3 text-center card-title"><sup>Signup</sup></h4>
                                        </div>
                                       <span><hr style="background-color: ##202942 !important;"></span>
                                            <form class="mt-4 login-form" action="{{ route('store-customer')  }}" method="POST" >
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
                                                            <input type="tel" class="pl-5 form-control" placeholder="phone" name="phone_number" maxLength="15" required="">
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
                                                            <input type="password" class="pl-5 form-control" placeholder="Password" required name="password" >
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
                                            <div class="mb-4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div> <!-- end about detail -->
                    </div> <!-- end col -->
                    <div class="order-1 col-lg-8 offset-lg-4 padding-less img" style="background-image:url('{{ asset('onboarding_assets/images/user/tongohills.jpg') }}')" data-jarallax='{"speed": 0.5}'></div>
                    <!-- end col -->
                </div><!--end row-->
            </div><!--end container fluid-->
        </section><!--end section-->
        <!-- Hero End -->
