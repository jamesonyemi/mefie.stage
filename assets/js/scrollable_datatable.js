'use strict';

// =======================Client Pages======================================


$(document).ready(function() {
    let table = $('table.project').DataTable({
        "scrollCollapse": false,
        "paging": true,
        "info": false,
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": $('td#project_id')
        }],
        "order": [
            [1, 'asc']
        ],

        initComplete: function() {
            let column = this.api().column($('td#status'));
            let select = $('<select class="form-control custom-select col-sm-2" style="margin-bottom:15px;"><option value="" >--select--</option></select>')
                .appendTo($('#filter_status').empty().text('Status: '))
                .on('change', function() {
                    let val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );
                    column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();

                });
            column.data().unique().sort().each(function(d, j) {
                select.append(
                    `<option value='${d}'> ${d}</option>`
                );
            });
        }
    });

    table.on('order.dt search.dt', function() {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    //   $('input.age_filter').on( 'keyup', function () {
    //       table.column(3).search( this.value ).order( [ 0, 'asc' ] ).draw();
    //   } );

});

// =======================Project Pages======================================



// =======================Client Pages======================================


$(document).ready(function() {
    let cTable = $('table.client').DataTable({
        "paging": true,
        "info": false,
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": $('td#client_ids')
        }],
        "order": [
            [1, 'asc']
        ],
    });

    cTable.on('order.dt search.dt', function() {
        cTable.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

});

// =======================Client Pages======================================



// ================ VIew Payment Per Pages=====================
$(document).ready(function() {
    var printCounter    =   0;
    var clientLabel     =   "Client Name";
    var projectTitle    =   "Project Name";
    var currencySymbol  =   "GHC";
    
    function client() {
        
        if ( $('#clientid').find(":selected").val() === '') {
            return "No client selected";
        }
        return $('#ts-name').find("#client-name").text();
    }
    
    function project() {
        
        if ( $('#pid').find(":selected").val() === '') {
            return "No project selected";
        }
        return $('#pid').find(":selected").text();
        
    }
    
    function projectPhase() {
        
        if ( $('#stage_id').find(":selected").val() === '') {
            return "No stage selected";
        }
        return $('#stage_id').find(":selected").text();
        
    }
    
    function totalPayment() {
        
        if ( $('#pid').find(":selected").val() === '') {
            return "No data";
        }
        return ( $('.row').find("#currency-symbol").text() ) + " " + 
                    (  $('.row').find("#total-cost").text() );
        
    }
    
   var table = $('table.payment-per-view').DataTable({     
      'columnDefs': [
         {
            "targets": $('td#pay-per-stage'),
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
      
       'dom': 'Bfrtip',
        'buttons': [
        {
            'extend': 'print',
            'title': '<span class="sub-title text-capitalize mt-5">print payment</span>',
            'className': 'btn btn-primary',
            'autoPrint': true,
            'messageTop': function () {
                
            return `<div class="ecommerce-stats-area mt-4">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="single-stats-card-box">
                            <div class="icon">
                                <i class="bx bxs-user"></i>
                            </div>
                            <span class="sub-title">${ clientLabel }</span>
                            <h3 class="text-capitalize" style="color:#6c757d !important;">${ client() } </h3>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="single-stats-card-box">
                            <div class="icon" style="background-color:#6c757d !important; box-shadow: 1px 5px 24px 0 rgba(125, 121, 121, 0.32);">
                                <i class="bx bxs-briefcase "></i>
                            </div>
                            <span class="sub-title">${ projectTitle }</span>
                            <h3 style="color:#6c757d !important;">${ project() }</h3>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="ecommerce-stats-area">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="single-stats-card-box">
                            <div class="icon" style="background-color:#6610f2 !important; box-shadow: 1px 5px 24px 0 rgba(125, 121, 121, 0.32);">
                                <i class="bx bx-purchase-tag"></i>
                            </div>
                            <span class="sub-title">Project Stage</span>
                            <h3 class="text-capitalize" style="color:#6c757d !important;" > ${ projectPhase()  } </h3>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="single-stats-card-box">
                            <div class="icon" style="background-color:#fd7e14 !important; box-shadow: 1px 5px 24px 0 rgba(125, 121, 121, 0.32);">
                                <i class="bx bx-credit-card"></i>
                            </div>
                            <span class="sub-title">Total Payment</span>
                            <h3 class="text-capitalize" style="color:#6c757d !important;"> ${ totalPayment() } </h3>
                        </div>
                    </div>
                </div>
            </div>`;
            },
            
            'messageBottom': function () {
                    printCounter++;
                   
                    if ( printCounter === 1 ) {
                        return 'This is the first time you have printed this document.';
                    }
                    else {
                        return 'You have printed this document '+printCounter+' times';
                    }

                    
                },
            customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '',
                        );
                        
                        $(win.document.body).find('th').addClass('text-primary text-uppercase mt-4').css('text-align', 'center');
                            $(win.document.body).find('table').addClass('display mt-4 card-body').css('font-size', '16px');
                            $(win.document.body).find('table').addClass('display').css('text-align', 'center');
                            $(win.document.body).find('tr:nth-child(odd) td').each(function (index) {
                                $(this).css('background-color', '#D0D0D0');
                            });

                        
                },
            'text': 'Print current page',
            'exportOptions': {
                'modifier': {
                    'page': 'current',
                    'selected': null
                }
            }
        }
    ],
        
      'select': {
         'style': 'multi'
      },
      'order': [[1, 'asc']]
   });
   
   table.columns([3,4]).visible(false);
   
   table.on('order.dt search.dt', function() {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    
    
   
});

// =======================End of Payment Page====================================


$(document).ready(function() {
    let cTable = $('table.corporate').DataTable({
        "scrollCollapse": false,
        "paging": true,
        "info": false,
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": $('td#corporate_ids')
        }],
        "order": [
            [1, 'asc']
        ],
    });

    cTable.on('order.dt search.dt', function() {
        cTable.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

});

// =======================Corporate-Client Pages======================================


// ======================= Stage-Of-Completion Pages======================================

$(document).ready(function() {
    let otherTable = $('table.stage').DataTable({
        "scrollCollapse": false,
        "paging": true,
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": $('td#stage')
        }],
        "order": [
            [1, 'asc']
        ],
    });
    otherTable.on('order.dt search.dt', function() {
        otherTable.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});

// ========================Stage-Of-Completion Pages===========================================


let columnIndexing = (indexedTable) => {
    indexedTable.on('order.dt search.dt', function() {
        cTable.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}