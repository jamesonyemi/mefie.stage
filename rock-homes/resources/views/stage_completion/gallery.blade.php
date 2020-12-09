
{{-- WORK-TO-DO for, DELETE SPECIFIC IMAGE FROM ARRAY LIST AND DATABASE ON CLICK --}}
<div class="gallery-area">
<div class="row">
  @php
    $couter = 1;
    @endphp
 {{-- @foreach ( json_decode($gallery->img_name)  as $key => $img) --}}
 {{-- {!! dd(($gallery))  !!} --}}
  @if ( empty( json_decode($gallery->img_name)) )
  <div class="col-lg-4 col-sm-6 col-md-6">
      <div class="single-gallery-image mb-30">
          <p>No Image Available</p>
      </div>
  </div>

  @endif
 {{-- @endforeach    --}}

 @foreach ( json_decode($gallery->img_name)  as $key => $img)
        @if ( !empty($img) )
        <div class="col-lg-4 col-sm-6 col-md-6 card-group">
            <div class="single-gallery-image mb-30">
              <div class="row">
                <div class="col-2" >
                    <a id="lop" href="{{ route('remove-unlink-image', [$r->id, $img]) }}" class="btn btn-danger rounded-left rounded-right active btn-sm"
                        role="button" onclick="event.preventDefault(); document.getElementById('delete_image{!!++$key!!}').submit();">
                    <i class='bx bx-trash' ></i>
                    <form id="{{'delete_image'. $key++ }}" action="{{ route('remove-unlink-image', [$r->id,$img]) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        @method('PUT')
                    </form>
                </a>
            </div>
            <div class="col-9">
              <img id="image" class="img-thumbnail rounded" src="{{  asset('/rock-homes/public/stage_of_completion_img/'.$img) }}" alt="Gallery Image" data-original="{{  asset('/rock-homes/public/stage_of_completion_img/'.$img) }}">
            </div>
              </div>
            </div>
        </div>
        @endif
  @endforeach
</div>
</div>

<script>
let msg   = 'Are you sure, you want to permanently delete this image?';
let msgs  = 'click the OK button, if you are sure';
let lop   = document.querySelector('a#lop'),
  image   = document.querySelector('image');
  lop.addEventListener('click', (e)=> {
    alert(msg+"\n"+msgs);

  });
</script>