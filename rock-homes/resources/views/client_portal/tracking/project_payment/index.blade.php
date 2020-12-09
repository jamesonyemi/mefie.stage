<div class="timeline mb-30">
    <div class="timeline-month" style="background-color:tomato">
        <span class="text-center text-capitalize "> {!! __('payments History') !!} </span>
    </div>

    <div class="timeline-section">
        <div class="row">
            @foreach ($payments as $track_payment)
            <div class="col-lg-4 col-md-6">
                <div class="timeline-box">
                    <div class="box-title">
                        <i class="bx bx-calendar text-primary"></i>                
                         {!! date("l, F j, Y", strtotime( $track_payment->paymentdate )) !!}

                    </div>

                    <div class="box-content">
                        <div class="box-item"><p class="mb-0 text-capitalize">{!! $track_payment->comments !!}</p></div>
                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <a class="col-md-5 text-capitalize" 
                            href="{!! route('my-payments.show', Crypt::encrypt($track_payment->id)) !!}" style="text-decoration: none; color:inherit">
                                <div>
                                    view details
                                </div>
                            </a>
                            <div class="col-md-6">
                                {{-- {!! Auth::user()->full_name !!} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>