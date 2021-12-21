<section class="content-header">
  <h1>
    <i class="fa fa-sign-in"></i> Data Pelamar
  </h1>

</section>
<?php
	$pelamar = new Pelamar();
	$lowongan = new Lowongan();
	$lowongan_rinci = new LowonganRinci();
	$user = new User();
	include "../include/fungsi_tanggal.php";

	/*----------------------------------
	------------------------------------
	------------------------------------
	------------------------------------
	Ketika pelamar melakuakn input data
	------------------------------------
	------------------------------------
	------------------------------------
	----------------------------------*/

if(!isset($_GET['penerimaan'])){
?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
			<h3>Pilih Penerimaan</h3> 
		<?php
			$qrL = $lowongan->GetData("where status = '1'");
		?>

          <table class="table table-bordered table-striped table-hover">
			<form class="form-horizontal row-fluid" action="index.php?menu=pelamar" method="get">
            <!-- tampilan tabel header -->
             <thead>
              <tr>
                <th class="center">Penerimaan</th>
               </tr>
             </thead>
           		 <tbody>
            		<th class="center"><input type="hidden" name="menu" value="pelamar">
						<div class="controls">
							<select name="penerimaan">
								<?php
								while ($row = $qrL->fetch()){
									echo "<option class='form-control' value='$row[id_lowongan]'>$row[lowongan]</option>";	
								}
								?>
							</select>
							<input class="btn btn-primary" type="submit" value="Pilih">
						</div>
					</th>
			</tbody>
			</form>
		</table>
	</div>
</div>
</div>
</div>
</section>

<?php
}else{
	$id_lowongan = $_GET['penerimaan'];
	$qrLw = $lowongan->GetData("where id_lowongan='$id_lowongan'");
	$nama_lw = $qrLw->fetch();

	if(isset($_GET['nilai_user'])){

			$id_user = $_GET['nilai_user'];
			$qrN = $user->GetData("where id_user='$id_user'");
			$rowN = $qrN->fetch();
			?>

<!------------------>

	<section class="content">
	    <div class="box box-primary">
        <div class="box-body">
		<div class="module-head">
			<h3>Rincian Nilai (<?php echo $rowN['nama_lengkap'] . ") " . $nama_lw['lowongan']; ?></h3> 
          <!-- tampilan tabel obat -->

            <!-- tampilan tabel header -->

<!------------------>
		<div class="module-body table">
		<?php
			if(isset($_POST['submit'])){
				$ar=1;
				$qryRincian = $lowongan_rinci->GetData("where id_lowongan='$id_lowongan' and status_nilai='1' order by kriteria asc");

				while($exec = $qryRincian->fetch()){
					$nilai = $_POST['input_' . $ar];
					$qry = $pelamar->SetNilai($nilai, $id_user, $id_lowongan, $exec['kriteria']);

	  				if($qry){
	  					echo "<script language='javascript'>alert('Nilai berhasil diberikan'); document.location='?menu=pelamar&penerimaan=$id_lowongan&nilai_user=$id_user'</script>";
	  				}else{
	  					echo "<script language='javascript'>alert('Gagal');document.location='menu=pelamar&penerimaan=$id_lowongan'</script>";
	  				}
					$ar++;
				}
			}

			$qryRincian = $pelamar->GetData("where id_user='$id_user' and id_lowongan='$id_lowongan' order by kriteria asc");
		?>
			<form class="form-horizontal" action="" method="post">
				<?php
				$ar=1;
				while($krit = $qryRincian->fetch()){
					$nu = $lowongan_rinci->GetData("where id_lowongan = '$id_lowongan' and kriteria = '$krit[kriteria]'");
					$cekKrit = $nu->fetch();
					echo "<table class='table'>
						<thead>
						<div for='basicinput'>$krit[kriteria]</div>";
					if($cekKrit['status_nilai'] == "1"){
						echo "<input type='text' id='basicinput' name='input_$ar' placeholder='Input Nilai $krit[kriteria]' class='form-control' value='$krit[nilai]'>";
						if($cekKrit['status_upload'] == "1")
							echo "<th><a target='blank' href='../upload/$krit[file]' class='span8'>Berkas Pelamar</a></div>";
						$ar++;
					}else if($cekKrit['status_upload'] == "1"){
						echo "<a target='blank' href='../upload/$krit[file]' class='span8'>Berkas Pelamar</a>";
					}
					
					echo "</div>
						  </div>
						  </thead>
						  </table>";
				}
				?>
				<th class="center">
					<div class="controls">
						<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
					</div>
				</div>
			</form>
		</div>
		</div>
		<?php

	}else{

		/*----------------------------------
		------------------------------------
		------------------------------------
		------------------------------------
		Ketika pelamar hanya menampilkan data
		------------------------------------
		------------------------------------
		------------------------------------
		----------------------------------*/
		
		?>

		<section class="content">
	    <div class="box box-primary">
        <div class="box-body">
		<div class="module-head">
			<h3>Data Pelamar <?php echo $nama_lw['lowongan']; ?></h3> 
          <!-- tampilan tabel obat -->
          <table class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Nama Lengkap</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
				<?php
					$no = 1;
					$getData = $pelamar->GetData("where id_lowongan='$id_lowongan'");
					$cek_user = "";
					while($data = $getData->fetch()){
						$qrU = $user->GetData("where id_user='$data[id_user]'");
						$rowU = $qrU->fetch();
						if ($data['id_user']==$cek_user)
							continue;
						echo "<tr class='center'>
							<td width = 10%>$no</td>
							<td width = 75%><a target='blank' href='index.php?menu=users&detail=$data[id_user]'>$rowU[nama_lengkap]</a></td>";
						echo "<td width = 15%> <a class='btn btn-small btn-success' href='?menu=pelamar&penerimaan=$id_lowongan&nilai_user=$data[id_user]'>Rincian Nilai</a></td>";
							// echo "<td width = 22%> <a class='btn btn-small btn-success' href='?ap=peserta&aksi=detail&id_peserta=$data[id_peserta]'>Detail</a> <a class='btn btn-small btn-danger' href='application/peserta/peserta_hapus.php?id_peserta=$data[id_peserta]&nama_peserta=$data[nama_lengkap]&lomba=$data[nama_lomba]'>Hapus</a> 
							// <a class='btn btn-small btn-info' href='?ap=peserta&aksi=edit&id_peserta=$data[id_peserta]'>Edit</a>
						echo "</tr>";
						$cek_user = $data['id_user'];

						$no++;
					}
					// $up = mysqli_query("update gtp_peserta set approve = '1' where approve = '0'");
				?>
				</tbody>
		</div>
	</table>
</div>
	<?php
	}
}
?>

          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content