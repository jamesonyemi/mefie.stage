<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
        <meta charset="utf-8" />
        <title>@yield('page-title') </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- favicon -->
        <link rel="shortcut icon" href=" {{ asset('onboarding_assets/images/mefie.ico') }} ">
        <!-- Bootstrap -->
        <link href="{{ asset('onboarding_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href=" {{ asset('onboarding_assets/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
      />
        <!-- Slider -->
        <link rel="stylesheet" href="{{ asset('onboarding_assets/css/owl.carousel.min.css') }} "/>
        <link rel="stylesheet" href=" {{ asset('onboarding_assets/css/owl.theme.default.min.css') }}"/>
        <!-- Main Css -->
        <link href="{{ asset('onboarding_assets/css/style.css') }} " rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="{{ asset('onboarding_assets/css/colors/default.css') }}" rel="stylesheet" id="color-opt">

        @section('style-section')

        @show

    </head>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->

     @yield('page-content-section')




     <!-- Footer Start -->

<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-left">
                    <p class="mb-0">&copy; {{ date("Y") . " " . config('app.name') }}  | Powered By <a href="https://www.eatechnologies.tech" target="_blank" class="text-reset">EAT</a>.</p>
                </div>
            </div><!--end col-->


        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<!-- Footer End -->



<!-- Back to top -->
<a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->

<!-- javascript -->
<script src="{{ asset('onboarding_assets/js/jquery-3.5.1.min.js') }} "></script>
<script src="{{ asset('onboarding_assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('onboarding_assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('onboarding_assets/js/scrollspy.min.js') }}"></script>
<!-- SLIDER -->
<script src="{{ asset('onboarding_assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('onboarding_assets/js/owl.init.js') }}"></script>
<!-- Icons -->
<script src="{{ asset('onboarding_assets/js/feather.min.js') }}"></script>
<script src="https://unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
<!-- Switcher -->
<script src="{{ asset('onboarding_assets/js/switcher.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('onboarding_assets/js/app.js') }}"></script>

@section('script-section')

  @show

</body>

</html>
