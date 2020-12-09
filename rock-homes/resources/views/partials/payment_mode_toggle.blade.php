<script>
    ( (e)  => {
        let payMode = $('#paymentmode');
        let targets = $('#bank, .cheque-no, .hide-me');
        let inputField = $('#bankname, #bankbranch, #chequeno');

        let mode = payMode.on('change',  () => {
           switch (payMode.select().val()) {
               case 'cash':
               case 'mobile-money':
                   targets.slideUp(1000);
                   inputField.hide().prop('required',false)
               break;

               case 'cheque':
               case 'cheque + cash':
                    targets.slideDown(1000);
                    inputField.attr('required', 'yes');
                    inputField.show();
                   break;
           }

            });
       })();
    </script>

<script>
    'use strict';
    $(document).ready(function ()
    {
        $('select[name="clientid"]').on('change', function(){
            var regionID = $(this).val();
            if(regionID)
            {
                $.ajax({
                    url : `{{ url('/admin-portal/onsite-visit/create' )}}/`+regionID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                    console.log(data);
                    $('select[name="pid"]').empty();
                    $('select[name="pid"]').append('<option value="">---select---</option>');
                    $.each(data, function(key,value){
                        $('select[name="pid"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    }
                });
            }
            else
            {
                $('select[name="pid"]').empty();
            }
        });

    });

</script>

   <script>
       ( function () {
           let paymentdate = $('input[type="date"].form-control');
           console.log(paymentdate);
           paymentdate.on('change', function() {
               let formatedDate = $('#date');
               formatedDate.hide();
               paymentdate.fadeIn();
           });

       })();
   </script>

   <script>
        function AlertMsg(params, msg) {
           let targetElement = params;
           let msgContent    = targetElement.textContent;
           let msgText       = targetElement.val(targetElement.text(msg));
           msgContent        = msgText;
       };
   </script>
