<div>
  <div class="page-content">
      <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-flex align-items-center justify-content-center">
                    <div class="my-3"></div>
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <div class="text-white card bg-info mb-30">
                  <div class="card-body">
                  <h5 class="text-white card-title font-weight-bold">Project Name</h5>
                  <p class="h3 card-text font-weight-normal text-capitalize">{!! $get_project->title !!}</p>
                  </div>
                  </div>
                  </div>
                <div class="col-lg-4 col-md-6">
                <div class="text-white card bg-primary mb-30">
                <div class="card-body">
                <h5 class="text-white card-title font-weight-bold">Budget Estimate</h5>
                <p class="h3 card-text font-weight-bold">
                  GH₵ 
                  <span class="" id="budget">
                  {!! number_format($estimatedBudget) !!}
                  </span>
                </p>
                </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-6">
                <div class="text-white bg-orange-300 card bg-secondary mb-30">
                <div class="card-body">
                <h5 class="text-white card-title font-weight-bold" >Amount Spent</h5>
                <p class="h3 card-text font-weight-bolder" > 
                   GH₵ 
                   <span class="" id="client-expenses">
                    {!! number_format($pay)  !!}
                   </span> 
                </p>
                </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-6">
                <div class="text-white card bg-light mb-30">
                <div class="card-body">
                <h5 class="text-dark card-title font-weight-bold" >Budget Status</h5>
                <p class="card-text font-weight-bold">
                  <span class="" id="client-budget-status">
                    {!! $budgetStatus !!}
                  </span>
                </p>
                </div>
                </div>
                </div>
                
                </div>
                </div>
                </div>
          </div>
          <br>