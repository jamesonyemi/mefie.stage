<script>
    $(document).ready(function() {
        $('select[name="rid"]').on('change', function () {
            var regionID = $(this).val();

            if (regionID) {
                $.get(`{{url("/admin-portal/projects/create/")}}/` + regionID, function(data) {
                    $('select[name="tid"]').empty();
                    $('select[name="tid"]').append( '<option value="">--select--</option>');

                    $.each(data,function(key, value) {
                        $('select[name="tid"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }, 'json');
            } else {
                $('select[name="tid"]').empty();
            }
        });
    });
</script>