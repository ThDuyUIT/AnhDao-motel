$(document).ready(function() {
    //'use strict';
    $('#tbl_data').DataTable( {
        columnDefs: [
            {
                targets: "_all",
                className: 'dt-head-center'
            }
          ]
    } );
    
    // $('#tbl_new_mess').DataTable( {
    // } );

    // $('#tbl_old_mess').DataTable( {
    // } );

})