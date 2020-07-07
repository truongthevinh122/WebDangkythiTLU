$(document).ready(function() {
    var t = $('#dataTables-bomon').DataTable( {
        "paging":   false,
        "searching": false,
        "columnDefs": [ {
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],

        "ajax" : "http://localhost:8235/api.dangkythi/api/tb_bomon/read.php",
        "columns" : [
            {"data":"bomon_id"},
            {"data":"bomon_ma"},
            {"data":"bomon_ten"},
        ]
    } );

    t.on('order.dt search.dt', function () {
     t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
           cell.innerHTML = i+1;
           //t.cell(cell).invalidate('dom');
     });
}).draw();

} );
