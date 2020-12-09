<script>
    'use strict';
    $(document).ready(function ()
    {
        $('select[name="clientid"]').on('change', function(){
            var regionID = $(this).val();
            if(regionID)
            {
                $.ajax({
                    url : `{{ url('/admin-portal/onsite-visit/create')}}/`+regionID,
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