<script>
     $(function() {
        $('select[name="cid"]').on('change', function () {
            let clientId = $(this).val();

            if (clientId) {
                $.get(`{{url('admin-portal/project-docs/get_project_owner')}}/` + clientId, function(data) {
                    $('select[name="pid"]').empty();
                    $('select[name="pid"]').append( '<option value=" ">--select--</option>');

                    $.each(data,function(key, value) {
                        $('select[name="pid"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }, 'json');
            } else {
                $('select[name="pid"]').empty();
            }
        });
    });
</script>