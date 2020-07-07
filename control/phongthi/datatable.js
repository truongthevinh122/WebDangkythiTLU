$(document).ready(function() {
    var t = $('#dataTables-phongthi').DataTable( {
        "searching": false,
        "columnDefs": [ {
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],

        "ajax" : "http://localhost:8235/api.dangkythi/api/tb_phongthi/read.php",
        "columns" : [
            {"data":"phongthi_ten"},
            {"data":"phongthi_ten"},
            {"data":"phongthi_loai"},
            {"data":"phongthi_sl"},
        ]
    } );

    t.on('order.dt search.dt', function () {
     t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
           cell.innerHTML = i+1;
           //t.cell(cell).invalidate('dom');
     });
}).draw();

} );
