<!-- start page title -->
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-flex align-items-center justify-content-between">
          <h4 class="mb-0 font-size-18">{{ $page_title ?? $page_title }}</h4>
          <div class="page-title-right">
              <a href="{{ url()->previous() }}" class="text-primary nav-link justify-content-center">
                 <span class="icon"><i class="bx bx-log-out-circle bx-sm"></i></span>
                 <span class="menu-title bx-sm">Back</span>   
              </a>
          </div>
      </div>
  </div>
</div>
<br>
<!-- end page title -->