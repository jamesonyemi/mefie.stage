    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="mt-2 alert alert-info alert-dismissible row fade show" role="alert" id="no-data">
            <strong class="mr-2"><i class="bx bx-info-circle " aria-hidden="true"></i></strong>
            <p class="">
                No Data available for Project with status, 
                <span class="text-capitalize">{!! !empty($status) ? "'$status'" : '' !!}</span>
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div id="description"></div>
