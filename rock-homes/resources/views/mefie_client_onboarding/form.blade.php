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

<script>
function checkPassword(str)
{
    var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(str);
    
}    


function validatePassword() {
    
    var err = document.getElementById('error');
    var errInfo = document.getElementById('errorInfo');
    var p = document.getElementById('password').value,
        errors = [];

       if (checkPassword(p)) {
           
           err.textContent = "Strong Password";
           err.classList.add('badge');
           err.classList.add('badge-success');
           errInfo.style.display = 'none'
           document.getElementById("btn-save").removeAttribute("disabled");

       } else{

           err.textContent = "failed test";
           errInfo.style.display = 'block'
           document.getElementById("btn-save").setAttribute("disabled", "disabled");
       }

   
}

document.getElementById('password').addEventListener('change', validatePassword);



</script>


@endsection
