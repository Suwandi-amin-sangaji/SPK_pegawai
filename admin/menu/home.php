<?php
    error_reporting(0);
    $lowongan = new lowongan();
    $user= new User();
    $pelamar = new HitungSPK();

    $qr_p = $lowongan->GetData("");
    $qr_u = $user->GetData("");
    $qr_pl = $pelamar->GetData("");
?>

 <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Home
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i> Home</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
   
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <h3><?php echo $qr_p->rowCount(); ?></h3>
            <p>Penerimaan</p>
          </div>
          <div class="icon">
            <i class="fa fa-sign-in"></i>
          </div>
            <a href="?menu=penerimaan" class="small-box-footer" title="View Penerimaan" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
    </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <h3><?php echo $qr_pl->rowCount(); ?></h3>
            <p>Pelamar</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <a href="?menu=pelamar" class="small-box-footer" title="View Pelamar" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <h3><?php echo $qr_u->rowCount(); ?></h3>
            <p>User</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="?menu=users" class="small-box-footer" title="View User" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#dd4b39;color:#fff" class="small-box">
          <div class="inner">
            <h3>Admin</h3>
            <p>Logout</p>
          </div>
          <div class="icon">
            <i class="fa fa-key"></i>
          </div>
          <a href="logout.php" class="small-box-footer" title="logout" data-toggle="tooltip"><i class="fa fa-key"></i></a>
        </div>
      </div><!-- ./col -->

            <?php
            //menghitung persentase lowongan yang telah diberi solusi
            $qr_persen = $lowongan->GetData("where status_solusi = '1'");
            $jml = $qr_persen->rowCount();
            $total = $qr_p->rowCount();
            $persen = round(($jml/$total) * 100,2);
            ?>

    </div><!-- /.row -->
  </section><!-- /.content -->