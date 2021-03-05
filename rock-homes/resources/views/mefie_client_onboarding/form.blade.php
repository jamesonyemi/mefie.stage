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


});

</script>

<script>
function checkPassword(str)
{
    const re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(str);
    
}    

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


function validatePassword() {
    
    let err = document.getElementById('error');
    let info = document.getElementById('info');
    let p = document.getElementById('password').value,
        errors = [];

       if (checkPassword(p)) {
           
           err.textContent = "Strong Password";
           err.classList.add('badge');
           err.classList.add('badge-success');
           err.classList.remove('badge-danger');
           document.getElementById('password').classList.add('border-success');
           document.getElementById('password').classList.remove('border-danger');
           info.classList.add('mt-4');
           document.getElementById("btn-save").removeAttribute("disabled");

       } else{

           err.textContent = "failed test";
           err.classList.add('badge');
           err.classList.add('badge-danger');
           document.getElementById('password').classList.remove('border-success');
           document.getElementById('password').classList.add('border-danger');
           info.classList.add('mt-2');
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


<script>
    
    async function getUsers(url_end_point, option) {
        
        let url = `{!! url('${url_end_point}/${option}') !!}`;
        try {
            let res = await fetch(url);
            return await res.json();
        } 
        catch (error) {
            console.log(error);
        }
        
    }
    
</script>

@include('mefie_client_onboarding.email_check')
@include('mefie_client_onboarding.company_name_check')

@endsection
