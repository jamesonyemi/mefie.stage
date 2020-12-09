@include('partials.client-portal.master_header')

 <!-- Start -->
 <div class="row">
     <div class="col-lg-12 col-md-12" style="margin-top:100px;">
        <h4>{!! $projectName->title !!}</h4>
         <div class="card mb-30">
             <div class="card mb-30 collapse-card-box">
                 <div class="card-body">
                    @include('partials.success_alert')
                    <div class="accordion-box row">
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i class="bx bx-plus"></i>
                                    View Documents
                                </a>
                                <table class="table table-bordered dt-responsive accordion-content show" style="display: none;">
                                    <thead>
                                        <tr class="row">
                                            @if (!$documents->isEmpty())
                                            @else
                                             <th class="scope badge badge-info" style="font-size:1.2rem">No document available yet</th> 
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $item)
                                            @foreach ( json_decode($item->docname) as $key => $doc)
                                                <tr>
                                                    <td class="row"> 
                                                        <a href="{{  asset( config('app.project_image').$doc) }}" class="nav-link" target="_blank" >   
                                                        {!!  str_replace('/project-documents/', '', $doc ) !!} 
                                                        </a>
                                                    </td>
                                                </tr>
                                              @endforeach
                                         @endforeach
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-header d-flex justify-content-between align-items-center" style="margin-bottom: -5px;">
                <i><small>My Documents</i></small>
            </div>
        </div>
    </div>
</div>
<br><br><br>

@include('partials.client-portal.footer')

