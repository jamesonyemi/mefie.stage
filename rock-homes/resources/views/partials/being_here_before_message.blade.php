@include('partials.header')
        <!-- Main Content Layout -->
            <!-- Start Maintenance Area -->
    <div class="maintenance-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="maintenance-content">
                    <a href="/" class="logo">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="app logo">
                    </a>
                   <div class="row">
                     <h2 class="my-5 ml-5" >{{ $congratulation_message  }}</h2>
                    </div>
                    <p>It seems you've been here before,
                        Kindly click the button below to Sign in</p>
                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Sign in</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Maintenance Area -->
