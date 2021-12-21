<?php
session_start();
require "../include/koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login | BANK PAPUA</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Aplikasi Persediaan Obat pada Apotek">
  <meta name="author" content="Vanny Hadiwijaya" />

  <!-- favicon -->
  <link rel="shortcut icon" href="../img/favpapua.png" />

  <!-- Bootstrap 3.3.2 -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
  <!-- capcha Goggle -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugin/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/plugin/toastr/toastr.min.css">



</head>

<body class="login-page bg-login">
  <div class="login-box">
    <div style="color:#3c8dbc" class="login-logo">
      <img style="margin-top:-12px" src="../img/logo.png" alt="Logo" height="75">
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <?php
      // CEK LOGIN
      if (isset($_GET["pesan"])) :
        if ($_GET["pesan"] == "salah") : ?>
          <div class="alert alert-danger"> Username Dan Password Salah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>
      <?php
        endif;
      endif; ?>
      <?php if (isset($_GET["pesan"])) :
        if ($_GET["pesan"] == "chaptca") : ?>
          <div class="alert alert-danger"> Chaptcha Yang Anda Masukkan Salah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>
          <?php
          //  echo "<script>window.history.go(-1);</script>"; 
          ?>
      <?php
        endif;
      endif;
      ?>
      <p class="login-box-msg"><i class="fa fa-user icon-title"></i> Silahkan Login</p>
      <br />
      <form action="" method="POST" id="login">
        <?php

        if (isset($_POST['submit'])) {
          $db = new DB();
          $username = $_POST['inputUsername'];
          $password = md5($_POST['inputPassword']);
          $secret_key = "6LcUEIAdAAAAAFrIwa-v-AcY7NiigfflCDo5gzUO";
          $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response']);
          $response = json_decode($verify);
          if ($response->success) {
            if ($username) {
              $cek = $db->LoginAdmin($username, $password);

              if ($cek->rowCount() > 0) {
                $row = $cek->fetch();
                $_SESSION['admin'] = $row['nama_admin'];
                header('location:index.php');
              } else {
                header('location:login.php?pesan=salah');
              }
            }
          } else {
            header('location:login.php?pesan=chaptca');
          }
        }
        ?>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="inputUsername" id="inputUsername" placeholder="Username" autocomplete="off" required />
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" required />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="g-recaptcha" data-sitekey="6LcUEIAdAAAAAPxvHUQlbhIcOq-Jl_C_fS6vif8K"></div>
        <br />
        <div class="row">
          <div class="col-xs-12">
            <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="submit" value="Login" />
          </div><!-- /.col -->
        </div>
      </form>

    </div><!-- /.login-box-body -->
    <p class="login-box-msg" style="padding-top:12px">&copy; Copyright <strong><span>BizLand</a></span></strong>. All Rights Reserved</p>

  </div>

  <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- SweetAlert2 -->
  <script src="assets/plugin/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="assets/plugin/toastr/toastr.min.js"></script>
</body>

</html>