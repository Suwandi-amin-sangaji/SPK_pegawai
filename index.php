<!--PHP-->
<?php

session_start();
include "include/koneksi.php";
$lowongan = new Lowongan();
if (isset($_SESSION['user'])) {
  echo "<script language='javascript'> window.location.href='user/index.php'</script>";
}

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
  <link href="img/favpapua.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="js/modernizr.custom.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- capcha Goggle -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
      <h1 class="logo mr-auto"><a href="index.php"><span><img src="img/logo.png" class="img-fluid" width="400" height="500" alt=""></span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#penerimaan">Penerimaan</a></li>
          <li><a href="#contact">Kontak</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Akses Login</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="admin">Admin</a>
              <a class="dropdown-item" href="manager">Manager</a>
            </div>
          </li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Lowongan <span>Kerja</spa>
      </h1>
      <h2>Bergabung bersama kami untuk mendapatkan karir yang lebih baik</h2>
      <!--PHP-->
      <div class="brand">
        <?php
        if (isset($_SESSION['user'])) {
        ?>
          <button type="button" class="btn btn-success btn-lg">My Profile</button>
        <?php
        } else {
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
    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>About</h2>
          <h3>TENTANG <span>BANK PAPUA</span></h3>
        </div>
        <div class="row">
          <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
            <img src="img/about1.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <ul>
              <li>
                <i class="bx bx-home"></i>
                <div>
                  <p>PT Bank Pembangunan Daerah Papua yang sebelum menjadi Perseroan Terbatas bernama Bank Pembangunan Daerah Irian Jaya, didirikan pada tanggal 13 April 1966 berdasarkan Surat Keputusan Gubernur Kepala Daerah Tingkat I Irian Barat Nomor : 37/GIB/1966 dan disahkan menjadi peraturan Daerah Provinsi Irian Barat Nomor 1 Tahun 1970 tanggal 23 Maret 1970, pada lembaran Daerah Provinsi Irian Barat No. 42 Tahun 1970, kemudian sesuai Surat Keputusan Menteri Keuangan RI No.Kep.283/ DDK/II/1972 tanggal 15 Juli 1972 tentang pemberian izin usaha Bank Pembangunan Daerah Irian Barat berkedudukan di Jayapura melaksanakan operasional sebagaimana Bank Umum lainnya dengan modal dasar pertama kali ditetapkan sebesar Rp. 4juta. </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">
        <div class="row skills-content">
          <div class="col-lg-6">
            <div class="progress">
              <span class="skill">Modal Dasar <i class="val">Rp 4.000.000.000,000,-</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="progress">
              <span class="skill">Modal Disetor <i class="val">Rp 2.434.111.022.106,-</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="progress">
              <span class="skill">Jumlah Aset <i class="val">Rp 28.183.686.506.901,-</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="progress">
              <span class="skill">Jumlah Karyawan <i class="val">2.421 orang</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Skills Section -->
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">
        <div class="owl-carousel testimonials-carousel">
          <div class="testimonial-item">
            <img src="img/komisaris.jpg" class="testimonial-img" alt="">
            <h3>T.E.A Hery Dosinaen, S.IP, M.KP, M.Si</h3>
            <h4>KOMISARIS UTAMA</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Lahir di Flores Timur 4 Mei 1967. Menyelesaikan pendidikan Sarjana di Universitas Gadjah Mada Jogjakarta pada tahun 1997 dan Pendidikan Pasca Sarjana di Universitas Cenderawasih tahun 2015
              Menjabat sebagai Komisaris Bank Papua pada tanggal 21 Desember 2018.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
          <!-- <div class="testimonial-item">
            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div> -->
        </div>
      </div>
    </section><!-- End Testimonials Section -->
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="penerimaan" class="faq section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h3>Penerimaan <span>Pegawai</span></h3>
          <p>Sistem Pendukung Keputusan Penerimaan Pegawai</p>
        </div>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Penerimaan</th>
              <th>Kuota</th>
              <th>Keterangan</th>
            </tr>
          </thead>

          <?php
          $get = $lowongan->GetData("where status='1'");
          while ($row = $get->fetch()) {
            echo "<tr>
                    <td>$row[lowongan]</td>
                    <td>$row[kuota]</td>
                    <td><a href='#' class='show_rincian' data-id='$row[id_lowongan]' data-wow-delay='1s' data-toggle='modal' data-target='#myModalSyarat'>Syarat</a></td>
                    </tr>";
          }
          ?>
        </table>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>KONTAK</h2>
          <h3><span>HUBUNGI KAMI</span></h3>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Alamat</h3>
              <p>Jl. Basuki Rahmat. Klawuyuk, Sorong Papua Barat</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>info@bankpapua.co.id</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Phones</h3>
              <p>0951-326380</p>
            </div>
          </div>
        </div>
        </form>
      </div>
      </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->
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
        </div>
      </div>
    </div>
    </div>

    <div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Login</h4> <?php
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

          </div>
          <div class="modal-body">
            <form role="form" method="post" action="login_user.php">
              <div class="form-group">
                <input type="text" name="username" class="form-control input-lg" placeholder="Username" tabindex="1">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control input-lg" placeholder="Password" tabindex="1">
              </div>
              <div class="g-recaptcha" data-sitekey="6LcUEIAdAAAAAPxvHUQlbhIcOq-Jl_C_fS6vif8K"></div>
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
              <!-- <div class="g-recaptcha" data-sitekey="6LcUEIAdAAAAAPxvHUQlbhIcOq-Jl_C_fS6vif8K"></div> -->
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

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- js -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.smooth-scroll.min.js"></script>
  <script src="js/jquery.dlmenu.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/custom.js"></script>

  <script>
    $(function() {
      $(document).on('click', '.show_rincian', function(e) {
        e.preventDefault();
        $("#myModalSyarat").modal('show');
        $.post('syarat_lamaran.php', {
            id: $(this).attr('data-id')
          },
          function(html) {
            $(".modal-body-syarat").html(html);
          }
        );
      });
    });
  </script>
  </body>
</html>