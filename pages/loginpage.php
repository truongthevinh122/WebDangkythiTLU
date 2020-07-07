
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dang Nhap - TLU</title>
    <link rel="icon" href="/api.dangkythi/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/api.dangkythi/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/api.dangkythi/assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="/api.dangkythi/assets/css/styles.css">
    <link rel="stylesheet" href="/api.dangkythi/assets/css/Team-Boxed.css">
</head>

<body>


    <div class="login-clean">
        <form method="post" action="/api.dangkythi/control/user/login_request.php">
            <h2 class="sr-only">Login Form</h2>

            <div class="illustration"><img id="1" class="LogoTLU" src="/api.dangkythi/assets/img/logotlu.jpg"></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Ten dang nhap" size="30"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Mat khau" size="50"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="login-bt">Đăng nhập</button></div>
            <?php
              if(@$_GET['Empty']==true){
                ?>
                <h3 style="color:red; font-size:14px;">Tên đăng nhập và mật khẩu không được để trống</h3>
              <?php
              }
             ?>

             <?php
               if(@$_GET['Invalid']==true){
                 ?>
                 <h3 style="color:red; font-size:14px;">Sai tên đăng nhập hoặc mật khẩu</h3>
               <?php
               }
              ?>

          </form>
    </div>
    <script src="/api.dangkythi/assets/js/jquery.min.js"></script>
    <script src="/api.dangkythi/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
