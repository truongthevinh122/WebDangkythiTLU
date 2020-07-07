$(document).ready(function() {
    var t = $('#dataTables-monthi').DataTable( {
        "pageLength": 25,
        "columnDefs": [ {
            "orderable": false,
            "targets": [0,4,5,6]
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
