
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <?php include ('../tabs/head.php');?>
</head>
<body>
    <div id="wrapper">
        <?php include('../tabs/navbartop.php');?>
        <!--/. NAV TOP  -->
        <?php include('../tabs/navsidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            <small>Đại học Thăng Long/</small> Danh sách môn học
                        </h1>
                    </div>
                </div>
                 <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <a href="danhsachmonhoc.php" class="btn btn-danger">Back</a>
                          <a class="btn btn-primary open-button" onclick="openFormAdd()">Add</a>
                        </div>
                        <div class="panel-body">

                            <div class="table-responsive">
                                <?php
                                  if(@$_GET['message']==true){
                                    ?>
                                    <div class="alert alert-success">
                                    <?php echo $_GET['message']; ?>
                                    </div>
                                    <?php
                                  }
                                 ?>

                              <?php include('../control/monhoc/dsedit.php'); ?>


                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
                <!-- /. ROW  -->
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel panel-heading">

                  </div>
                  <div class="panel panel-body">

                  </div>

                </div>

              </div>

            </div>

        </div>
               <footer><p>Dai hoc Thang Long</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
     <script>
     $(document).ready(function() {
     var t = $('#dataTables-example').DataTable( {
         "columnDefs": [ {
             "searchable": false,
             "orderable": false,
             "targets": [0,3,4]
         } ],
         "order": [[ 1, 'asc' ]]
     } );

     t.on( 'order.dt search.dt', function () {
         t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             cell.innerHTML = i+1;
         } );
     } ).draw();
 } );
     </script>

    <?php include('../tabs/jquery.php'); ?>


</body>
</html>
