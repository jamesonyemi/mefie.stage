@extends('mefie_client_onboarding.layouts.master')

@section('page-title', config('app.name'))

@section('style-section')
    @parent
@endsection

@section('page-content-section')
    @include('mefie_client_onboarding.signup')
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

    $('#customCheck1').click(function(){
        $("#customCheck1").is(':checked') ?
            $("#btn-save").removeAttr("disabled") +
            $("#customCheck1").attr("checked", "checked")
             :
            $("#btn-save").attr("disabled", "disabled") +
            $("#customCheck1").removeAttr("checked", "checked")
    });
    $("#btn-save").attr("disabled", "disabled");
    $("#customCheck1").removeAttr("checked", "checked");

});

</script>
@endsection
