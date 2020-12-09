@include('partials.client-portal.master_header')
   <br><br>
   <!-- Start -->
   <div class="card mb-30 mt-5">
            <h3>Update Setting </h3>
               <i class="badge badge-warning">(You will be redirect to login with your new credentials)  </i>  
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
                <?php $encryptId = Crypt::encrypt( Auth::id() )  ?>
            <form class="mt-5" action="{{ route('my-user-settings.update', $encryptId) }}" method="POST">
                    {{ csrf_field() }}
                    @method("PUT")
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name">First Name</label>
                        <input type="text" class="form-control" value="{{  Auth::user()->first_name }}" name="first_name" id="first_name" required>
                            @if ($errors->has('first_name'))
                            <span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->middle_name }}" name="middle_name" id="middle_name" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('last_name') ? ' has-error' : '' }} ">
                            <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->last_name }}" name="last_name" id="last_name" required>
                                 @if ($errors->has('last_name'))
                                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                                 @endif
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('email') ? ' has-error' : '' }} ">
                            <label for="email">Email</label>
                        <input type="email" class="form-control" value="{{  Auth::user()->email }}" name="email" id="email" required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required >
                            <span class="badge badge-pill badge-danger" id="error-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                            <span class="badge badge-pill badge-success" id="success-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="email">Comfirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            <span class="badge badge-pill badge-danger" id="error-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                            <span class="badge badge-pill badge-success" id="success-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                        </div>
                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col-1"></div>
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                   Save Changes</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>
        <!-- End -->
        <div class="flex-grow-1"></div>
 @include('partials.client-portal.footer')
</div>

<script>
    ( function () {

        let password    = $('input[name="password"]');
        let confirmPwd  = $('input[name="password_confirmation"]');
        let error       = $('#error-msg');
        let success     = $('#success-msg');
        let saveButton  = $('button[type="submit"]');

    confirmPwd.on('keyup', function () {
        if ( confirmPwd.val() === password.val() ) {

            let accepted = function () {
                success.show();
                error.hide();
                saveButton.removeAttr("disabled","disabled");
                AlertMsg(success, "\n"+ "Accepted");
            }
            return accepted();
        }

            if (  confirmPwd.val() !== password.val()  ) {

                let rejected = function () {
                    success.hide();
                    error.show();
                    saveButton.attr("disabled","disabled");
                    AlertMsg(error, "\n"+ "Password mis-match");
                }
                return rejected();
            }

            // let comparePwd  =   ( password.val() === confirmPwd.val() ? accepted() : rejected() );
         });

    password.on('keyup', function () {
        if ( password.val() === confirmPwd.val()   ) {

            let accepted = function () {
                success.show();
                error.hide();
                saveButton.removeAttr("disabled","disabled");
                AlertMsg(success, "\n"+ "Accepted");
            }
            return accepted();
        }

            if (  password.val() !== confirmPwd.val()  ) {

                let rejected = function () {
                    success.hide();
                    error.show();
                    saveButton.attr("disabled","disabled");
                    AlertMsg(error, "\n"+ "Password mis-match");
                }
                return rejected();
            }

            // let comparePwd  =   ( password.val() === confirmPwd.val() ? accepted() : rejected() );
         });

    })();

    function AlertMsg(params, msg) {
        let targetElement = params;
        let msgContent    = targetElement.textContent;
        let msgText       = targetElement.val(targetElement.text(msg));
        msgContent        = msgText;
    };
</script>