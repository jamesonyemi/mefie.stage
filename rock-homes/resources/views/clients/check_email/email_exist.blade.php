<script>
    let firstEmailField   =  document.getElementById("email");
    let secEmailField     =  document.getElementById("secondary_email");
    let notify            =  document.getElementById("signal-message");
    let btnSave           =  document.getElementById("btn-save");

    (
        function clientInfo() {
            firstEmailField.addEventListener('change', (e) => {
                if ( firstEmailField.value.length <= 0 ) {
                    notify.classList.add("badge");
                    notify.classList.add("badge-warning");
                    notify.classList.add("bx");
                    notify.classList.remove("badge-danger");
                    notify.classList.remove("bx-info");
                    notify.classList.remove("bx-check-double");
                    notify.classList.remove("badge-success");
                    notify.classList.remove("bx-x");
                    notify.innerText = "can not be empty";
                    notify.style.color = "black";
                    firstEmailField.style.border = "1px solid yellow";
                    btnSave.setAttribute("disabled", "yes");

                } else if(firstEmailField.value.length > 0) {
                    let getId  = firstEmailField.value;
                    fetch(`{!! url('admin-portal/clients/create/ic-form/fetch-email') !!}`)
                  .then(
                      function(response) {
                          if (response.status !== 200) {
                              console.log('Looks like there was a problem. Status Code: ' +
                                  response.status);
                              return;
                          }
                          // Examine the text in the response
                          response.json().then(function(data) {
                              const result = data.includes(firstEmailField.value);
                               if (result === true || validate()) {

                                      firstEmailField.textContent = getId;
                                      notify.classList.add("badge");
                                      notify.classList.remove("badge-success");
                                      notify.classList.add("badge-info");
                                      notify.classList.add("bx");
                                      notify.classList.add("bx-x");
                                      notify.classList.remove("bx-check-double");
                                      notify.innerText = getId + ", "+ 'already exist';
                                      firstEmailField.style.border = "1px solid red";
                                      btnSave.setAttribute("disabled", "yes");

                               }
                               else if( result === false) {

                                      firstEmailField.textContent = getId;
                                      notify.classList.add("badge");
                                      notify.classList.remove("badge-danger");
                                      notify.classList.remove("bx-x");
                                      notify.classList.remove("badge-warning");

                                      notify.classList.add("badge-success");
                                      notify.classList.add("bx");
                                      notify.classList.add("bx-check-double");
                                      notify.innerText = getId + ", "+ 'accepted & approved';
                                      firstEmailField.style.border = "1px solid green";
                                      btnSave.removeAttribute("disabled", "yes");

                               }

                              console.log(data);
                           });

                      }
                  )
                  .catch(function(err) {
                      console.log('Fetch Error :-S', err);
                  });

                }
          });

          btnSave.setAttribute("disabled", "yes");
}

)();

</script>

<script>


    function validateEmail(email) {
        let btn_save = document.getElementById("btn-save");
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return re.test(email);
    }

    function validate() {

        const result = $("#email");
        const email = result.val();
        result.text("");

            if (validateEmail(email)) {

                result.text(email + " is valid :");
                result.css("color", "black");

            }
            else {

                notify.textContent = (email + " waiting for input" );
                notify.classList.add("badge-info");
                notify.classList.remove("badge-success");
                result.css("color", "black");
                result.css("border", "1.50px solid #17a2b8");
                btn_save.attr("disabled", "yes");

            }
        return false;
}

</script>

<script>
    $(document).ready(validate());
</script>