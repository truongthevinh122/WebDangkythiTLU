$(document).ready(function() {
    var t = $('#dataTables-kieuthi').DataTable( {
        "paging":   false,
        "searching": false,
        "columnDefs": [ {
            "orderable": false,
            "targets": [0,2,3]
        } ],
        "order": [[ 1, 'asc' ]],

    } );

    t.on('order.dt search.dt', function () {
     t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
           cell.innerHTML = i+1;
           //t.cell(cell).invalidate('dom');
     });
}).draw();

} );
