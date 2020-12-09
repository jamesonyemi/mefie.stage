 $(function() {
        $('select[name="cid"]').on('change', function () {
            var cid = $(this).val();

            if (cid) {
                $.get(`{{url('admin-portal/project-docs/get_project_owner')}}/` + cid, function(data) {
                    $('select[name="owner"]').empty();
                    $('select[name="owner"]').append( '<option value="">--select--</option>');

                    $.each(data,function(key, value) {
                        $('select[name="owner"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }, 'json');
            } else {
                $('select[name="owner"]').empty();
            }
        });
    });