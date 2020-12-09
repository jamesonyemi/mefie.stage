<!-- Footer Start -->

<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-left">
                    <p class="mb-0">&copy; {{ date("Y") . config('app.name') }}  | Powered By <a href="https://www.eatechnologies.tech" target="_blank" class="text-reset">EAT</a>.</p>
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
<script src="{{ asset('js/jquery-3.5.1.min.js') }} "></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/scrollspy.min.js') }}"></script>
<!-- SLIDER -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/owl.init.js') }}"></script>
<!-- Icons -->
<script src="{{ asset('js/feather.min.js') }} "></script>
<script src="https://unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
<!-- Switcher -->
<script src="{{ asset('js/switcher.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('js/app.js') }}"></script>

@section('script-section')

  @show

</body>

</html>
