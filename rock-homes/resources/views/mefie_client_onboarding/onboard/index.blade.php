        <!-- Navbar STart -->
        <header id="topnav" class="sticky defaultscroll">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="#">
                        <img src="{{ asset('onboarding_assets/images/mefie_logo.png') }} " height="24" alt="">
                    </a>
                </div>
                <!--div class="buy-button">
                    <a href="signup.html" target="_blank" class="btn btn-primary">Sign Up</a>
                </div--><!--end login button-->
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li id="home-feature"><a href="#home">Home</a></li>


                        <li id="about-feature">
                            <a href="#about">About</a>
                        </li>

                        <li id="pricing-feature">
                            <a href="#price">Pricing</a>
                        </li>

                        <li id="contact-feature">
                            <a href="#contact">Contact</a>
                        </li>

                        <li id="contact-feature">
                            <a href="{{ route("login") }}">Sign in</a>
                        </li>
                    </ul><!--end navigation menu-->
                    <!--div class="buy-menu-btn d-none">
                        <a href="signup.html" target="_blank" class="btn btn-primary">Buy Now</a>
                    </div--><!--end login button-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->

        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100" id="home">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7">
                        <div class="mt-4 title-heading" >
                            <h1 class="mb-3 heading">Manage your building projects with <span class="text-primary">{{ " ". config('app.name') }}</span> app</h1>
                            <p class="para-desc text-muted">A Web application that will help you manage all your building projects in an easy, simple and effective way. Users are able to access all project related information through any web connected mobile device, tablet, laptop, or desktop. Track the progress of your building project from various stages to completion. Manage multiple building projects all on one platform.</p>
                            <div class="mt-4">
                                <!--a href="javascript:void(0)" class="mt-2 mr-2 btn btn-primary"><i class="mdi mdi-apple"></i> </a-->
                                <a href="{{ route('sign-up') }}" class="mt-2 btn btn-outline-primary"><i class="mdi mdi-account"></i> Sign Up</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="pt-2 mt-4 col-lg-6 col-md-5 mt-sm-0 pt-sm-0">
                        <div class="text-center text-md-right">
                            <img src="{{ asset('onboarding_assets/images/app/1a.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="overflow-hidden shape text-light">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <!-- Features Start -->
        <section class="section bg-light" id='about'>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="text-center col-12">
                        <div class="pb-2 mb-4 section-title">
                            <h4 class="mb-4 title">{{ " ". config('app.name') . " " }} Features</h4>
                            <p class="mx-auto mb-0 text-muted para-desc">With <span class="text-primary font-weight-bold">{{ " ". config('app.name') }}</span> accessing well documented data about your building project is made easy.
                            from photos, land documents, permits, amounts spent etc.Stay on track with the progress of your buiding project
                            </p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-8 col-md-8">
                        <div mt-4 pt-2 class="row">
                            <div class="col-md-6 col-12">
                                <div class="pt-4 pb-4 media features">
                                    <div class="mt-2 mr-3 text-center icon rounded-circle text-primary">
                                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="title">Project Tracking</h4>
                                        <p class="mb-0 text-muted para">Track the Progress of your project from start to finish, with detailed info with photos</p>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-md-6 col-12">
                                <div class="pt-4 pb-4 media features">
                                    <div class="mt-2 mr-3 text-center icon rounded-circle text-primary">
                                        <i data-feather="feather" class="fea icon-ex-md text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="title">Projects</h4>
                                        <p class="mb-0 text-muted para">Manage multiple number of projects for several clients at several locations</p>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-md-6 col-12">
                                <div class="pt-4 pb-4 media features">
                                    <div class="mt-2 mr-3 text-center icon rounded-circle text-primary">
                                        <i data-feather="eye" class="fea icon-ex-md text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="title">Document Upload</h4>
                                        <p class="mb-0 text-muted para">How about accessing all your project documents at once place? Project documents can also submit via the portal</p>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-md-6 col-12">
                                <div class="pt-4 pb-4 media features">
                                    <div class="mt-2 mr-3 text-center icon rounded-circle text-primary">
                                        <i data-feather="user-check" class="fea icon-ex-md text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="title">Payments</h4>
                                        <p class="mb-0 text-muted para">Log all payments for made for different stages of a project. From the foundation stage to completion</p>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-md-6 col-12">
                                <div class="pt-4 pb-4 media features">
                                    <div class="mt-2 mr-3 text-center icon rounded-circle text-primary">
                                        <i data-feather="smartphone" class="fea icon-ex-md text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="title">Reports</h4>
                                        <p class="mb-0 text-muted para">Reports are an essential component in the Management of any organisation. generate several reports including Completed, Ongoing, Canceled, Stalled projects etc.</p>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-md-6 col-12">
                                <div class="pt-4 pb-4 media features">
                                    <div class="mt-2 mr-3 text-center icon rounded-circle text-primary">
                                        <i data-feather="heart" class="fea icon-ex-md text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="title">360&deg; Images</h4>
                                        <p class="mb-0 text-muted para">Get access to 360 &deg; imagery. Walk through your building project from the comfort of your home via phone, tablet, Laptop etc.</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end col-->

                    <div class="pt-2 mt-4 text-center col-lg-4 col-md-4 col-12 text-md-right">
                        <img src="{{  asset('onboarding_assets/images/app/2a.png')  }}" class="img-fluid" alt="">
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Feature End -->

        <!-- Showcase Start -->
        <section class="pt-0 section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="text-center col-12">
                        <div class="pb-2 mb-4 section-title">
                            <h4 class="mb-4 title">How Can We Help You ?</h4>
                            <p class="mx-auto mb-0 text-muted para-desc">Start working with <span class="text-primary font-weight-bold">{{ " ". config('app.name') }}</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row align-items-center">
                    <div class="pt-2 mt-4 col-lg-5 col-md-6">
                        <img src="{{ asset('onboarding_assets/images/app/3a.png') }}" class="mx-auto img-fluid d-block" alt="">
                    </div><!--end col-->

                    <div class="pt-2 mt-4 col-lg-7 col-md-6">
                        <div class="section-title ml-lg-5">
                            <h4 class="mb-4 title">Best <span class="text-primary">
                                {{ config('app.name') }}</span> App Partner For Your Life</h4>
                            <p class="text-muted">You can combine all the Mefie templates into a single one, you can take a component from the Application theme and use it in the Website.</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-0"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                                <li class="mb-0"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Our Talented & Experienced Marketing Agency</li>
                                <li class="mb-0"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Create your own skin to match your brand</li>
                            </ul>
                            <a href="javascript:void(0)" class="mt-3 h6 text-primary">Find Out More <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->


        </section><!--end section-->
        <!-- Showcase End -->

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="overflow-hidden text-white shape">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <!-- Price Start -->
        <section class="section" id='price'>
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="text-center col-12">
                        <div class="pb-2 mb-4 section-title" >
                            <h4 class="mb-4 title">Choose The Pricing Plan</h4>
                            <p class="mx-auto mb-0 text-muted para-desc">Start working with <span class="text-primary font-weight-bold">{{ config('app.name') }}</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row align-items-center">
                    <div class="pt-2 mt-4 col-md-4 col-12">
                        <div class="py-5 text-center border-0 rounded card pricing-rates bg-light">
                            <div class="card-body">
                                <h2 class="mb-4 title text-uppercase">Standard</h2>
                                <div class="mb-4 d-flex justify-content-center">
                                    <span class="mt-2 mb-0 h4">GHS</span>
                                    <span class="mb-0 price h1">80</span>
                                    <span class="mb-1 h4 align-self-end">/mo</span>
                                </div>

                                <ul class="pl-0 mb-0 list-unstyled">
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Full Access</li>
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Enhanced Security</li>
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Source Files</li>
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>1 Domain Free</li>
                                </ul>
                                <a href="{{ route('sign-up') }}" class="mt-4 btn btn-primary">Sign Up</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="pt-2 mt-4 col-md-4 col-12">
                        <div class="py-5 text-center border-0 rounded card pricing-rates starter-plan bg-light">
                            <div class="card-body">
                                <h2 class="mb-4 title text-uppercase text-primary">Professional (Most Popular)</h2>
                                <div class="mb-4 d-flex justify-content-center">
                                    <span class="mt-2 mb-0 h4">GHS</span>
                                    <span class="mb-0 price h1">100</span>
                                    <span class="mb-1 h4 align-self-end">/mo</span>
                                </div>

                                <ul class="pl-0 mb-0 list-unstyled">
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Full Access</li>
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Source Files</li>
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Free Appointments</li>
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Enhanced Security</li>
                                </ul>
                                <a href="{{ route('sign-up') }}" class="mt-4 btn btn-primary">Sign Up</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="pt-2 mt-4 col-md-4 col-12">
                        <div class="py-5 text-center border-0 rounded card pricing-rates bg-light">
                            <div class="card-body">
                                <h2 class="mb-4 title text-uppercase">Premium</h2>
                                <div class="mb-4 d-flex justify-content-center">
                                    <span class="mt-2 mb-0 h4">GHS</span>
                                    <span class="mb-0 price h1">150</span>
                                    <span class="mb-1 h4 align-self-end">/mo</span>
                                </div>

                                <ul class="pl-0 mb-0 list-unstyled">
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Full Access</li>
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Enhanced Security</li>
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>Source Files</li>
                                    <li class="mb-0 h6 text-muted"><span class="mr-2 text-primary h5"><i class="uim uim-check-circle"></i></span>1 Domain Free</li>
                                </ul>
                                <a href="{{ route('sign-up') }}" class="mt-4 btn btn-primary">Sign Up</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Price End -->
        <!-- Testi n Download cta start -->
        <section class="pt-0 section" id='contact'>
            <div class="container">
                <!--end row-->

                <div class="pt-2 mt-4 row mt-md-5 pt-md-3 mt-sm-0 pt-sm-0 justify-content-center">
                    <div class="text-center col-12">
                        <div class="section-title">
                            <h4 class="mb-4 title">Contact Us</h4>
                            <p class="mx-auto text-muted para-desc">You may reach<span class="text-primary font-weight-bold">
                                {{ " ". config('app.name') . config('app.name_suffix') }}</span> by clicking on the email or phone icons below</p>
                            <div class="mt-4">
                                <a href="mailto:{{ config('app.contact_email') }}" class="mt-2 mr-2 btn btn-primary"><i class="mdi mdi-email"></i> </a>
                                <a href="tel:{{ config('app.contact_number') }}" class="mt-2 btn btn-outline-primary"><i class="mdi mdi-cellphone"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Testi n Download cta End -->


        <!-- Shape Start -->
        <div class="position-relative">
            <div class="overflow-hidden shape text-footer">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->
