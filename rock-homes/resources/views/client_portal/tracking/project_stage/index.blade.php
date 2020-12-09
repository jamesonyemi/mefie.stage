<div class="timeline mb-30">
    <div class="timeline-month" style="background-color:mediumvioletred">
        <span class="text-center text-capitalize "> {!! __('stage of completion') !!} </span>
    </div>

    <div class="timeline-section">
        <div class="row">
            @foreach ($project_stages as $track_stage)
            <div class="col-lg-4 col-md-6">
                <div class="timeline-box">
                    <div class="box-title">
                        <i class="bx bx-calendar text-primary"></i>                
                         {!! date("l, F j, Y", strtotime( $track_stage->stage_entry_date )) !!}

                    </div>

                    <div class="box-content">
                        <div class="box-item"><p class="mb-0 text-capitalize">{!! $track_stage->amtdetails !!}</p></div>
                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <a class="col-md-5 text-capitalize" 
                            href="{!! route('my-stage-of-completion.show', Crypt::encrypt($track_stage->stage_id)) !!}" style="text-decoration: none; color:inherit">
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