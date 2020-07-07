$(document).ready(function() {
    var t = $('#dataTables-example').DataTable( {

        "pageLength": 25,
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],

        "ajax" : "http://localhost:8235/api.dangkythi/api/tb_monhoc/read.php",
        "columns" : [
            {"data":"monhoc_id"},
            {"data":"monhoc_ma"},
            {"data":"monhoc_ten"},
            {"data":"bomon_ma", "orderable": false},
        ]
    } );

    t.on('order.dt search.dt', function () {
     t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
           cell.innerHTML = i+1;
           //t.cell(cell).invalidate('dom');
     });
}).draw();

} );
