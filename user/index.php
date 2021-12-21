<?php

	session_start();
	include "../include/koneksi.php";
	if(isset($_SESSION['user'])){

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Penerimaan Pegawai Baru | BANK PAPUA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../img/favpapua.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="../js/modernizr.custom.js"></script>
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="../css/style.css" rel="stylesheet" media="screen">

  <!-- =======================================================
  * Template Name: BizLand - v1.2.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:info@bankpapua.co.id">info@bankpapua.co.id</a>
        <i class="icofont-phone"></i> 0951-326380
      </div>
     
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php"><span><img src="../img/logo.png" class="img-fluid" width="400" height="500" alt=""></span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block ">
        <ul>
          <li class="active"><a href="index.php">Profil</a></li>
              <li><a href="?page=penerimaan">Penerimaan</a></li>
              <li><a href="?page=pengumuman">Pengumuman</a></li>
              <li><a href="logout_user.php">Logout</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos-delay="100">
      <h1>Lowongan <span>Kerja</spa>
      </h1>
      <h2>Bergabung bersama kami untuk mendapatkan karir yang lebih baik</h2>
      <!--PHP-->
      <div class="brand">
            <?php
                if(isset($_SESSION['user'])){
              ?>
                <button type="button" class="btn btn-primary btn-lg">Selamat Datang <?php echo $_SESSION['name']; ?></button>
              <?php
                }else{
              ?>
              <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalRegister">Register</button>
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalLogin">Login</button>
              <?php
                }
            ?>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

  <?php
    include "page.php";


  }else{

    echo "<script language='javascript'> window.location.href='../index.php'</script>";

  }
  ?>
    
  </main> 

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>BANK PAPUA<span>.</span></h3>
            <p>
              Jl. Basuki Rahmat. Klawuyuk. <br>
              Sorong, Papua Barat<br>
              Indonesia <br><br>
              <strong>Phone:</strong> 0951-326380<br>
              <strong>Email:</strong> info@bankpapua.co.id<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          </div>

          
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="login_user.php">
          <div class="form-group">
                        <input type="text" name="username" class="form-control input-lg" placeholder="Username" tabindex="1">
          </div>
          <div class="form-group">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" tabindex="1">
          </div>
        
      </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Login">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="register.php">
          <div class="form-group">
                        <input type="text" name="nama_lengkap" class="form-control input-lg" placeholder="Nama Lengkap" tabindex="1">
          </div>
          <div class="form-group">
                        <input type="email" name="email" class="form-control input-lg" placeholder="Email" tabindex="1">
          </div>
          <div class="form-group">
                        <input type="text" name="username" class="form-control input-lg" placeholder="Username" tabindex="1">
          </div>
          <div class="form-group">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" tabindex="1">
          </div>
      </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Register">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModalSyarat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Syarat Penerimaan</h4>
      </div>

      <div class="modal-body">
          <div class="form-group">
          <div class="modal-body-syarat">
          </div>
      </div>

      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved <br>
        
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->


  </body>

  <script src="../assets/js/main.js"></script>
  <!-- js -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.smooth-scroll.min.js"></script>
  <script src="../js/jquery.dlmenu.js"></script>
  <script src="../js/wow.min.js"></script>
  <script src="../js/custom.js"></script>
</html>
