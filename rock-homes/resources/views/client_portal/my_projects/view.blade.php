
@include('partials.client-portal.master_header')
        <!-- Start -->
        <div class="row" style="margin-top:100px;">
            <div class="col-lg-6 col-md-6">
                <div class="stats-card-box">
                    <div class="icon-box">
                        <i class="bx bx-map"></i>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <span class="sub-title">Location</span>
                            <div class="row">
                            <span class="badge badge-primary">{!! ucfirst($projects->location) !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-6 col-md-6">
                <div class="stats-card-box">
                    <div class="icon-box">
                        <span class="icon"><i class='' style="font-size: 15px; font-weight:bold">GH₵</i></span>
                    </div>
                    <div class="row">
                    <span class="sub-title">Amt Spent</span>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="row">
                            <span class="badge badge-primary">{!! $pay !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="stats-card-box">
                    <div class="icon-box">
                        <i class="bx bx-bar-chart-alt"></i>
                    </div>
                    <div class="row">
                    <span class="sub-title">Project Status</span>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="row">
                                 <span class="badge badge-primary">{!! ucfirst($projects->status) !!}</span>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="stats-card-box">
                    <div class="icon-box">
                        <i class="bx bx-briefcase-alt-2"></i>
                    </div>
                    @php
                    function truncate($text, $chars = 20) {
                        if(strlen($text) > $chars) {
                            $text = $text.' ';
                            $text = substr($text, 0, $chars);
                            $text = substr($text, 0, strrpos($text ,' '));
                            $text = $text.'...';
                        }
                        return $text;
                    }   
                @endphp
                <div class="row">
                    <span class="sub-title">Project</span>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                             <div class="row">
                                 <span class="badge badge-primary"><span ></span>{!! truncate($projects->title) !!}</span> 
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('client_portal.my_projects.gallery_modal')
        @include('client_portal.my_projects.payment_breakdown')
@include('partials.client-portal.footer')

<script>
    // =======================My Projects======================================
$(document).ready(function() {
  let cTable = $('table.clients').DataTable({
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": true,
        "info": false,
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": $('td#client_ids')
        } ],
        "order": [[ 1, 'asc' ]],
  });

  cTable.on( 'order.dt search.dt', function () {
    cTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();
  
} );

// =======================My Projects======================================

</script>