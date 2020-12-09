@extends('mefie_client_onboarding.layouts.master')

@section('page-title', config('app.name'))

@section('style-section')
    @parent
@endsection

@section('page-content-section')
    @include('mefie_client_onboarding.onboard.index')
@endsection


@section('script-section')

<script >

$(document).ready(function(){
      $('#home-feature').click(function(){
        $('li').removeClass("active");
        $(this).addClass("active")
    });
    
    $('#about-feature').click(function(){
        $('li').removeClass("active");
        $(this).addClass("active")
    });
    
    $('#pricing-feature').click(function(){
        $('li').removeClass("active");
        $(this).addClass("active")
    });
    
    $('#contact-feature').click(function(){
        $('li').removeClass("active");
        $(this).addClass("active")
    });
    
});

</script>
@endsection
