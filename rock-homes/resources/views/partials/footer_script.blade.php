<!-- Footer Scripts -->
<!-- Vendors Min JS -->
<script src="{{asset('assets/js/vendors.min.js')}}"  ></script>

<!-- ChartJS -->
<script src="{{asset('assets/js/chartjs/chartjs.min.js')}}"  ></script>
<!-- When the url is charts/chartjs then load the library -->

<!-- To use template colors with Javascript -->
<div class="chartjs-colors">
  <div class="bg-primary"></div>
  <div class="bg-primary-light"></div>
  <div class="bg-secondary"></div>
  <div class="bg-info"></div>
  <div class="bg-success"></div>
  <div class="bg-success-light"></div>
  <div class="bg-danger"></div>
  <div class="bg-warning"></div>
  <div class="bg-purple"></div>
  <div class="bg-pink"></div>
</div>

<!-- jvectormap Min JS -->
<script src="{{asset('assets/js/jvectormap-1.2.2.min.js')}}"  ></script>
<!-- jvectormap World Mill JS -->
<script src="{{asset('assets/js/jvectormap-world-mill-en.js')}}"  ></script>

<!-- When the url is pages/maps then load the library -->

<!-- Custom JS -->
<script src="{{asset('assets/js/custom.js')}}"  ></script>
<script src="{{asset('assets/js/jquery-3.3.1.js')}}" type="text/javascript"  ></script>
<script src="{{asset('assets/js/scrollable_datatable.js')}}" type="text/javascript"  ></script>

<script src="{{asset('assets/js/image_preview.js')}}" type="text/javascript"  ></script>

{{-- =======================custom-de-asseto================= --}}
<!-- JAVASCRIPT -->
<script src=" {{ asset('custom_assets/libs/metismenu/metisMenu.min.js') }}"  ></script>
<script src=" {{ asset('custom_assets/libs/simplebar/simplebar.min.js') }}"   ></script>
<script src=" {{ asset('custom_assets/libs/node-waves/waves.min.js') }}"   ></script>

<!-- Required datatable js -->
<script src=" {{ asset('custom_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"  ></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"  ></script>
<!-- Buttons examples -->
<script src=" {{ asset('custom_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"  ></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"  ></script>
<script src=" {{ asset('custom_assets/libs/jszip/jszip.min.js') }}"  ></script>
<script src=" {{ asset('custom_assets/libs/pdfmake/build/pdfmake.min.js') }}"  ></script>
<script src=" {{ asset('custom_assets/libs/pdfmake/build/vfs_fonts.js') }}"  ></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"  ></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"  ></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"  ></script>
<!-- Responsive examples -->
<script src=" {{ asset('custom_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"  ></script>
<script src=" {{ asset('custom_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"  ></script>

<!-- Datatable init js -->
<!--<script src=" {{ asset('custom_assets/js/pages/datatables.init.js') }}"  ></script>-->

<!--intlTelInput js-->
<script src="{{ asset('assets/plugins/intl-tel-input-master/intlTelInput.js') }}"></script>
<script src="{{ asset('assets/plugins/intl-tel-input-master/country-select.js') }}"></script>
<script src="{{ asset('assets/plugins/intl-tel-input-master/utils.js') }}"></script>


<script type="text/javascript"  >
     $(document).ready(
       
     function() {
        $('select[name="cid"]').on('change', function () {
            var clientId = $(this).val();

            if (clientId) {
                $.get(`{{url('admin-portal/project-docs/get_project_owner')}}/` + clientId, function(data) {
                    $('select[name="pid"]').empty();
                    $('select[name="pid"]').append( '<option value="">--select--</option>');

                    $.each(data,function(key, value) {
                        $('select[name="pid"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }, 'json');
            } else {
                $('select[name="pid"]').empty();
            }
        });
    });

const endPoint =   'http://api.ipstack.com/' + "check" + '?access_key=13694568fd526b61e3fc06f9abdb4e27&format=1';
fetch(`${endPoint}`)
   .then( function(response) {
       if (response.status !== 200) {
           console.log('Looks like there was a problem. Status Code: ' +
               response.status);
           return;
       }
       // Examine the text in the response
       response.json().then(function(data) {
           if (document.getElementById("flag")) {
               document.getElementById("flag").textContent = data.location.country_flag_emoji;
           }
           return;
       })
   });    
   
    
</script>


<script >
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#company-logo')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    let formData        =   document.querySelector('#form-data');
    let btn_submit      =   document.querySelector('#btn-submit');
    let btn_close       =   document.querySelector('#close');
    let btn_dismiss     =   document.querySelector('#dismiss');

  
    btn_submit.addEventListener('submit', (e) => {
        e.preventDefault();
        formData.reset();
        
    });
    
    btn_close.addEventListener('click', () => {
         formData.reset();
    });
    
    btn_dismiss.addEventListener('click', () => {
         formData.reset();
    });

    
</script>

<script src="{{asset('assets/js/bootstrap-live-search.js')}}" type="text/javascript"  ></script>
</body>
</html>