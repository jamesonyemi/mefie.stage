@php
    $key =  0;
    $status = config("app.cancelled_status_text");
@endphp

@if (empty($client_cancelled_project))
@include('partials.check_for_empty_value', [ $status ])
@else
    @foreach ($client_cancelled_project as $item)

    <div class="my-4 row animate__animated animate__slideInLeft">
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
        <div class="col-lg-8 col-md-6 col-sm-12">
            <div class="card top-rated-product-box mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="text-capitalize ">{{ $status . " Projects"  }}</h2>
                  </div>
                  
        
        <div class="card-body">
        <ul>
            @foreach ( json_decode($item->img_path) as $path)
        <li class="single-product">
            <a 
            href="{{ asset(config('app.rock_rel_path').$path ) }}" 
            class="image d-inline-block"
            target="_blank"
            rel="noopener noreferrer nofollow"
        >
            <img data-cfsrc="{{ asset(config('app.rock_rel_path').$path ) }} " 
            alt="image" src="{{ asset(config('app.rock_rel_path').$path) }} ">
        </a>
            @endforeach
                  {{ $item->region }}
                  <h4 class="mb-2">
                    <a href="#" class="d-inline-block">{{ $item->title }}
                    </a>
                    <div class="d-inline-block">
                        <span class="icon"><i class="bx bx-map text-info"></i></span>
                        {{ $item->region }}
                    </div>
                </h4>
        <p class="mb-2" >{{ $item->description }}</p>
        <div class=" price d-inline-block">{{ "GHC ".number_format($item->totalcost, 2) }}</div>
        {{-- @include('partials.rating') --}}
        <a href="#" class="view-link d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Details"><i class="bx bxs-arrow-to-right"></i></a>
        </li>
        @endforeach
        </ul>
        </div>

    </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2"></div>
    </div>
@endif