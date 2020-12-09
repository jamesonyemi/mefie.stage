<div>
    <div class="gallery-area">
     <div class="row">
         @if ( count($singleProject) === 0 )
         <div >
             <div class="single-gallery-image mb-30">
                 <p>No Image Available</p>
             </div>
         </div>
         @endif
 
         @if ( count($singleProject) > 0 )
         @foreach ( $singleProject as $stage )
             @foreach ( json_decode($stage->img_name) as $img)
             <div class="col-lg-4 col-sm-6 col-md-6">
                 <div class="single-gallery-image mb-30">
                     <img class="img-thumbnail rounded" src="{{ asset(config('app.stage_image').$img) }}" alt="Gallery Image" data-original="{{ asset(config('app.stage_image').$img) }}" style="height:90px; width:100px">
                 </div>
             </div>
         @endforeach
         @endforeach
         @endif
     </div>
 </div>
 {{-- <nav>
     <ul class="pagination justify-content-end">
         {!! $stageOfCompletion->links() !!}
     </ul>
 </nav> --}}
</div>
