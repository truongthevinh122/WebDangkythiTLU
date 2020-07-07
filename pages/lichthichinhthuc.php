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
                            <small>Đại học Thăng Long/</small> Lịch thi chính thức
                        </h1>
                    </div>
                </div>
                 <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <?php include('../control/lichthichinhthuc/filter_ky.php') ?>

                        <?php include('../control/lichthichinhthuc/dslichthict.php') ?>

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
                    Thống kê lịch thi
                  </div>
                  <div class="panel panel-body">
                    <?php include('../control/lichthichinhthuc/report.php') ?>
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
     <script src="/api.dangkythi/control/lichthichinhthuc/datatable.js" ></script>
    <?php include('../tabs/jquery.php'); ?>
</body>
</html>
