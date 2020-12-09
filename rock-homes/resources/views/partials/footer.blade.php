<!-- Footer -->
 <div class="flex-grow-1"></div>
<!-- Start Footer -->
<footer class="footer-area">
    <div class="row align-items-center">
        <div class="col-lg-6 col-sm-6 col-md-6">
            <p>Copyright <i class='bx bx-copyright'></i> {{ date("Y")}} <a href="{!! config('app.company_url') !!}">{!! str_replace( '-', ' ',config('app.company_name')) !!}</a>. All rights reserved</p>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 text-right">
            <p>Designed with ❤️ <a href="{!! config('app.company_url') !!}" target="_blank"> <small>{!! str_replace( '-', ' ',config('app.company_name')) !!}</small></a></p>
        </div>
    </div>
</footer>
<!-- End Footer -->
        </div>
        <!-- End Main Content Wrapper -->

     @include('partials.footer_script')