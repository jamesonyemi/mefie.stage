@include('partials.master_header')
@include('partials.success_alert')
<div class="mt-4" style="margin-bottom:-2rem;">
<h3>Project Document</h3>
</div>
<div class="card mb-30 mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
    </div>
  <div class="card-body">
<form action="{{ route('project-docs.store') }}" method="POST"  class="mt-3 mb-3" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    <div class="row mb-4">
     <div class="col-md-4">
            <div class="custom-control custom-radio mt-3">
                <label for="document">Project Owner</label>
                <select class="custom-select"  name="cid" id="cid"  required >
                    <option value="">---select---</option>
                    @foreach ($all_client as $key => $value )
                  <option value="{{ $value->clientid }}">
                        {{ ltrim( ucfirst($value->client_name) )  }}
                  </option>
                   @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-control custom-radio mt-3">
                <label class="" for="document_prepared">Project Name</label>
                <select class="custom-select" required name="pid" id="pid">
                </select>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-control custom-radio mt-3">
                <label for="document">Contract Type</label>
                <select class="custom-select"  name="contract_docs_id" id="contract_docs_id" required >
                    <option value=" ">--select--</option>
                    @foreach ($contract_docs_type as $key => $contract_type )
                    <option value="{{ $contract_type->contract_id }}">
                        {{ ucfirst($contract_type->contract_type) }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 ">
            <div class="custom-control custom-checkbox mt-3">
                <label class="" for="ready_document">Documents Already Available</label>
                <select class="custom-select" required name="is_ready" id="is_ready">
                    <option value="">--select--</option>
                    <option value="yes">{{ ucfirst("yes") }}</option>
                    <option value="no">{{ ucfirst("no") }}</option>
                </select>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-control custom-radio mt-3">
                <label class="" for="document_submitted">Documents Submitted</label>
                <select class="custom-select" required name="is_submitted" id="is_submitted">
                    <option value="">--select--</option>
                    <option value="yes">{{ ucfirst("yes") }}</option>
                    <option value="no">{{ ucfirst("no") }}</option>
                </select>
            </div>

        </div>
        <div class="col-md-4">
            <div class="custom-control custom-radio mt-3">
                <label class="" for="document_prepared">Documents Prepared by Company</label>
                <select class="custom-select" required name="is_prepared" id="is_prepared">
                    <option value="">--select--</option>
                    <option value="yes">{{ ucfirst("yes") }}</option>
                    <option value="no">{{ ucfirst("no") }}</option>
                </select>
                <div class="invalid-feedback"></div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
     <div class="col-md-4" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You can attach one or more documents">
            <div class="custom-control custom-radio mt-3">
                <label for="document">Attach Documents</label>
                <input type="file" class="form-control" accept=".pdf,.doc,.docx, .xls, .xlsx, .jpeg, .jpg" max="50000" id="docname" name="docname[]" multiple="" required="">
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    <hr style="background-color:fuchsia; opacity:0.1" class="mt-5 mb-4">
    <div class="container ml-5">
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-lg btn-primary float-xl-right "><i data-feather="database"></i>
                Save</button>
            </div>
            <div class="form-group col-md-1"></div>
    </div>
    </div>
    </form>
</div>
</div>
<div class="mt-5"></div>
 <!-- End -->
@include('partials.footer')
   
    
    