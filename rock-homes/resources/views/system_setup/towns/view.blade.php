@include('partials.header')
@include('partials.side_menu')

<!-- End Sidemenu Area -->

<!-- Main Content Wrapper -->
<div class="main-content d-flex flex-column">
    <!-- Top Navbar -->
    <!-- Top Navbar Area -->
    @include('partials.topnav')
    <!-- End Top Navbar Area -->

    <!-- Main Content Layout -->
    <!-- Breadcrumb Area -->
    @include('partials.breadcrumb')
    <!-- End Breadcrumb Area -->


        <!-- Start -->

        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>View Town</h3>
            </div>
            <div class="card-body">
                <form class="mt-3">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_region">Region</label>
                            <div class="list-group-item bx-sm">{{ ucfirst( $keyMap->region) }}</div>
                        </div>
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-4">
                            <label for="title">Town:</label>
                            <div class="list-group-item bx-sm">{{ ucfirst( $keyMap->town) }}</div>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
