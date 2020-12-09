@include('partials.header')
<body>
    <!-- Main Content Layout -->
    <!-- Start Login Area -->
    <div class="login-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="login-form">
                    <div class="logo p-4">
                        <a href="#">
                            <img src="{{ asset(config('app.app_logo')) }}" alt="app-logo">
                        </a>
                    </div>

                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                        @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                        @endif

                    <form method="POST" action="{{ route('login') }}" >
                        {{csrf_field()}}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                            <span class="label-title">
                                <i class='bx bx-user'></i>
                            </span>
                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="label-title">
                                <i class='bx bx-lock'></i>
                            </span>
                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="remember-forgot">
                                <label class="checkbox-box">Remember me
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <a href="{{ route('password.request') }}" 
                                class="forgot-password" style="color: #f2682b !important; padding-left:10px;">Forgot password?</a>
                            </div>
                        </div>

                        <button type="submit" class="login-btn mb-2" style="background-color: #293754 !important">Login</button>
                            <p class="mt-5">Powered By 
                                <a href="{!! config('app.company_url') !!}" target="_blank">
                                     <small class="text-primary">
                                         {!! str_replace( '-', ' ',config('app.company_name')) !!}
                                     </small>
                                </a>
                            </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Area -->

    @include('partials.login_footer')