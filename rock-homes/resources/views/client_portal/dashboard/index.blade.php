@include('partials.client-portal.master_header')
<div class="welcome-area"style="margin-top:75px">
    <div class="row m-0 align-items-center" >
        <div class="col-lg-5 col-md-12 p-0">
            <div class="welcome-content">
                <h2 class="mb-2">Welcome <p class="text-capitalize">{!! Auth::user()->full_name !!}</p></h2>
                <p class="mb-0" style="font-size: 1.25rem">{!! config('app.name') !!}</p>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 p-0"> 
            <div class="welcome-img">
                <img src="{{ asset('assets/img/welcome-img.png') }}" alt="image">
            </div>
        </div>
    </div>
</div>
@include('partials.client-portal.footer')