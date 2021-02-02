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
    
    let err = document.getElementById('error');
    let errInfo = document.getElementById('errorInfo');
    let p = document.getElementById('password').value,
        errors = [];

       if (checkPassword(p)) {
           
           err.textContent = "Strong Password";
           err.classList.add('badge');
           err.classList.add('badge-success');
           document.getElementById('password').classList.add('border-success');
           errInfo.style.display = 'none'
           document.getElementById("btn-save").removeAttribute("disabled");

       } else{

           err.textContent = "failed test";
           document.getElementById('password').classList.remove('border-success');
           errInfo.style.display = 'block'
           document.getElementById("btn-save").setAttribute("disabled", "disabled");
       }

   
}

document.getElementById('password').addEventListener('change', validatePassword);

function validPhoneNumber()
{
  
    
  let phone_no = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]{8,15}$/g;

  if( document.getElementById('phone').value.match(phone_no))
     {
         
      
        document.getElementById('phone').classList.add('border-success');
        document.getElementById('phone_number_status').classList.add('badge');
        document.getElementById('phone_number_status').classList.add('badge-success');
        document.getElementById('phone_number_status').classList.remove('badge-danger');
        document.getElementById('phone_number_status').textContent = "Accepted";

        return true;
       
     }
     
   else
     {
      
        document.getElementById('phone').classList.remove('border-success');
        document.getElementById('phone_number_status').classList.add('badge');
        document.getElementById('phone_number_status').classList.add('badge-danger');
        document.getElementById('phone_number_status').classList.remove('badge-success');
        document.getElementById('phone_number_status').textContent = "Not a valid Phone Number";

        return false;
	
     }
}

document.getElementById('phone').addEventListener('change', validPhoneNumber);


</script>


@endsection
