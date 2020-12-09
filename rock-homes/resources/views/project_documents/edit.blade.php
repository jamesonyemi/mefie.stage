@include('partials.master_header')
@include('partials.success_alert')

         <div class="row mt-5 cmb-3">
             <div class="ml-3">
                 <h3>Edit Project Document</h3>
             </div>
         </div>
        <div class="card mb-5">
            <div class="card-header d-flex justify-content-between align-items-center">
    @foreach ($projectDocs as $docs)
        <?php $ownedBy  = ($docs->full_name) ? $docs->full_name : ''  ?>
        <div class="row">
            <div class="col-md-12">
                <span class="text-center badge badge-primary" style="font-size:1rem;">Project Owner: {{ $ownedBy}}</span>
                    <i class="badge badge-primary"></i>
            </div>
        </div>
    @endforeach
            </div><hr>
 <div class="card-body">
  <form action="{{ route('project-docs.update', Crypt::encrypt($docs->id)) }}" method="POST"  class="mt-3" enctype="multipart/form-data">
  @foreach ($projectDocs as $docs)
    {{ csrf_field() }}
    @method("PUT")
    <div class="row">
        <div class="col-md-1"></div>
      <div class="col-md-4">
            <div class="custom-control custom-checkbox mb-3">
            <label class="" for="ready_document">Documents Already Available</label>
            <select class="custom-select" required name="is_ready" id="is_ready">
                @php
                    $yes  = ( $docs->is_ready !== 'yes' ) ? "yes" : $docs->is_ready;
                    $no   = ( $docs->is_ready === 'no' ) ? $docs->is_ready : "no";
                   @endphp
            <option value="{!!$yes !!}">{!!ucwords($yes) !!}</option>
            <option value="{!!$no !!}">{!! ucwords($no) !!}</option>
            </select>
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="col-md-1"></div>
      <div class="col-md-4">
    <div class="custom-control custom-radio">
        <label class="" for="document_submitted">Documents Submitted</label>
        <select class="custom-select"  name="is_submitted" id="is_submitted" required>
                @php
                    $yes  = ( $docs->is_submitted !== 'yes' ) ? "yes" : $docs->is_submitted;
                    $no   = ( $docs->is_submitted === 'no' ) ? $docs->is_submitted : "no";
                @endphp
            <option value="{!!$yes !!}">{!!ucwords($yes) !!}</option>
            <option value="{!!$no !!}">{!! ucwords($no) !!}</option>
        </select>
    </div>

</div>

</div>
<div class="row">
    <div class="col-md-1"></div>
      <div class="col-md-4">
        <div class="custom-control custom-radio mt-3">
            <label class="" for="document_prepared">Documents Prepared by Company</label>
            <select class="custom-select"  name="is_prepared" id="is_prepared" required>
                @php
                    $yes  = ( $docs->is_prepared !== 'yes' ) ? "yes" : $docs->is_prepared;
                    $no   = ( $docs->is_prepared === 'no' ) ? $docs->is_prepared : "no";
                @endphp
            <option value="{!!$yes !!}">{!!ucwords($yes) !!}</option>
            <option value="{!!$no !!}">{!! ucwords($no) !!}</option>
        </select>
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="col-md-1"></div>
      <div class="col-md-4">
        <div class="custom-control custom-radio mt-3">
            <label class="" for="document_prepared">Project</label>
            <select class="custom-select" name="pid" id="pid" required>
               @foreach ($all_clients as $key => $value )
               <option value="{{ $value->pid }}" {{ old('pid', in_array($docs->pid,[$value->pid]) ? $docs->pid : 'null') == $docs->pid ? 'selected' : '' }}>
                {{ ucwords($value->project_title) }}
               </option>
               @endforeach
            </select>
            <div class="invalid-feedback"></div>
        </div>
    </div>
</div>
<hr style="background-color:fuchsia; opacity:0.1" class="mt-5">
<div class="container">
    <div class="row">
        <div class="col text-center">
            <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                Save Changes</button>
            </div>
            <div class="col-sm-1"></div>
            {{-- <div class="form-group col-md-1"></div> --}}
        </div>
    </div>
@endforeach
</form>
<br>
</div>
</div>
<br><br><br>
 <!-- End -->

    @include('partials.footer')