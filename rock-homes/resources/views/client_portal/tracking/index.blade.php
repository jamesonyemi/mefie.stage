
@include('partials.client-portal.master_header')

<div class="timeline mb-30" style="margin-top: 7%;">
    <div class="timeline-month">
        Tracking History <small class="bx bx-transfer-alt bx-tada pl-2"></small> <span class="pl-1">{!! $project->title !!}</span class="pl-1">
    </div>
    <!--ONSITE VISIT SECTION -->
    @include('client_portal.tracking.project_visit.index')
    <!--END OF ONSITE VISIT SECTION-->

     <!--ONSITE PAYMENT SECTION -->
    @include('client_portal.tracking.project_payment.index')
    <!--END OF PAYMENT VISIT SECTION-->

      <!--ONSITE STAGEOFCOMPLETION SECTION -->
    @include('client_portal.tracking.project_stage.index')
    <!--END OF STAGEOFCOMPLETION SECTION-->

</div>

@include('partials.client-portal.footer')
