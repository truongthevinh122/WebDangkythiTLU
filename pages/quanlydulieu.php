
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
                            <small>Đại học Thăng Long/</small> Quản lý bảng dữ liệu
                        </h1>
                        <?php
                          if(@$_GET['message']==true){
                            ?>
                            <div class="alert alert-success">
                            <?php echo $_GET['message']; ?>
                            </div>
                            <?php
                          }
                         ?>
                    </div>
                </div>
                 <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-6">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">

                        <?php include "../control/namhoc/dsnamhoc.php" ?>


                    </div>
                    <!--End Advanced Tables -->
                </div>
                <div class="col-md-6">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">

                        <?php include "../control/kyhoc/dskyhoc.php" ?>

                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
                <!-- /. ROW  -->
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel panel-heading">
                    <span id="message"></span>
                    Bộ môn
                    <button class="open-button btn btn-primary" onclick="openFormBM()">Import</button>
                    <?php include "../control/bomon/importForm.php" ?>
                  </div>
                  <div class="panel panel-body">

                      <?php include "../control/bomon/dsbomon.php" ?>

                  </div>

                </div>

              </div>
              <div class="col-md-6">
                <div class="panel panel-default">

                  <?php include "../control/cathi/dscathi.php" ?>

                </div>

              </div>
              <div class="col-md-6">
                <div class="panel panel-default">

                  <?php include "../control/phongthi/dsphongthi.php" ?>

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



    <?php include('../tabs/jquery.php'); ?>
    <script src="/api.dangkythi/control/bomon/datatable.js"></script>
    <script src="/api.dangkythi/control/phongthi/datatable.js"></script>

</body>
</html>
