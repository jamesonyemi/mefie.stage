<script>
    'use strict';
    $(document).ready(function ()
    {
        $('#pid').on('change', function(){
            var pID = $(this).val();
            if(pID && pID !== null )
            {
                $.ajax({
                    url : `{{ url('/admin-portal/cost-of-project' )}}/`+pID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                       $("#total-cost").text(numberWithCommas(data.total_cost));
                    }
                });
            }
            else
            {
                $('select[name="pid"]').empty();
            }
        });
        
        $('#stage_id').on('change', function(){
            let project_phase_id = $(this).val();
            let project_id       = $('#pid').find(":selected").val();
            if(project_phase_id && project_phase_id !== null )
            {
                $.ajax({
                    url : `{{ url('/admin-portal/compute-total-cost-of-project-by-project-phase' )}}/`+project_id+ '/'+project_phase_id,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                       $("#total-cost").text(numberWithCommas(data.total_cost));
                    }
                });
            } else {
                $("#total-cost").text(numberWithCommas("No Data Yet"));
            }
           
        });
        
        $('#clientid').on('change', function(){
            var clientID = $(this).val();
            if(clientID)
            {
                $.ajax({
                    url : `{{ url('/admin-portal/owner-of-project' )}}/`+clientID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                       $("#client-name").text( data.client_name);
                    }
                });
            }
            
        });
        
        
    });
    
    function numberWithCommas(...x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

</script>


<script>

    /* Custom filtering function which will search data in column  */
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            
            let stage = $('#stage_id').find(":selected").val();
            let owner = $('#clientid').find(":selected").val();
            let project = $('#pid').find(":selected").val();
            let stage_value = data[1];
            let client = data[4];
            let projectId = data[3];

     
            if (  ( stage || stage === stage_value )  )
            {
                return true;
            }
            
            if ( ( owner || owner === client)  )
            {
                return true;
            }
            
             if ( (  project === projectId )  )
            {
                return true;
            }
            
            return false;
        }
    );
     
$(document).ready(function() {
    let table = $('.table').DataTable();
    
    table.columns([3,4]).visible(false);
     
    $('#stage_id').change( function() {
        table.search(this.value).order( [[ 2, 'desc' ]] ).draw();
    } );
    
   
    $('#pid').on( 'change', function () {
        table.columns( 3 ).search( this.value ).order( [[ 3, 'desc' ]] ).draw();
    } );
    
    
    $('#clientid').on( 'change', function () {
        table.columns( 4 ).search( this.value ).order( [[ 4, 'desc' ]] ).draw();
    } );
    
} );
</script>