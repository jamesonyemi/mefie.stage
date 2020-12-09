<div>
    <div class="gallery-area">
     <div class="row">
         @if ( count($flattened_array) === 0 )
         <div class="col-lg-4 col-sm-6 col-md-6">
             <div class="single-gallery-image mb-30">
                 <p>No Image Available</p>
             </div>
         </div>
         @endif
 
         @if ( count($flattened_array) > 0 )
         @foreach ( $flattened_array as $visit )
             @foreach ( json_decode($visit->img_name) as $img)
             <div class="col-lg-4 col-sm-6 col-md-6">
                 <div class="single-gallery-image mb-30">
                     <img class="img-thumbnail rounded" src="{{ asset(config('app.project_image').$img) }}" alt="Gallery Image" data-original="{{ asset(config('app.project_image').$img) }}" style="height:120px; width:200px">
                 </div>
             </div>
         @endforeach
         @endforeach
         @endif
     </div>
 </div>
</div>
