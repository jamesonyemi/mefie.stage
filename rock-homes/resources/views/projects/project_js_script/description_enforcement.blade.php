<script>
  'use strict';
 

     let descriptionArea    =   document.getElementById("description");
     let notifyError        =   document.getElementById("signal-message");
     let signalIcon         =   document.querySelector("#signal-icon");
     let submitButton       =   document.querySelector('#save-project');
     
     
    (
        () => {

            
             descriptionArea.addEventListener("change", () => {
                 
             if( (descriptionArea.value.length <= 70) || (descriptionArea.value === undefined) ) {

                 submitButton.setAttribute("disabled", "disabled");
                 submitButton.classList.add("invisible");
                 notifyError.classList.add("text-danger");
                 signalIcon.classList.add("badge");
                 signalIcon.classList.add("badge-danger");

                 notifyError.innerText = 'a total of at least 70 word is required';
                 notifyError.textContent = notifyError.innerText;

             } else {
                 
                 notifyError.classList.remove("text-danger");
                 signalIcon.classList.remove("badge");
                 signalIcon.classList.remove("badge-danger");
                 submitButton.classList.remove("invisible");
                 submitButton.removeAttribute("disabled");

                 signalIcon.classList.add("text-success");
                 signalIcon.classList.add("bx");
                 signalIcon.classList.add("bx-check-double");
                 

                 notifyError.classList.add("text-success");
                 notifyError.innerText = 'Great job, description looks better';
                 notifyError.textContent = notifyError.innerText;


             }
             
        }); 
     }
     
 )();
 
 </script>