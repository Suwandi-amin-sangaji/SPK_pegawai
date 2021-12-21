
<?php
	$lowongan = new lowongan();

	if(isset($_GET['aksi'])){
		if($_GET['aksi']=="tambah"){
			/*----------------------------------
			------------------------------------
			------------------------------------
			------------------------------------
			Ketika user ingin menambah data
			------------------------------------
			------------------------------------
			------------------------------------
			----------------------------------*/
			?>


<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Input Penerimaan Baru
  </h1>

</section>
			<section class="content">
			  <div class="row">
			    <div class="col-md-12">	
				  <div class="box box-primary">
			        <div class="box-body">
					<h3></h3>
			          <!-- tampilan tabel obat -->
			          <table class="table table-bordered table-striped table-hover">
					<form class="form-horizontal row-fluid" action="" method="post">
			            <!-- tampilan tabel header -->
			            <thead> 
			            <tr>
						<th for="basicinput">Penerimaan</th>
						<th for="basicinput">Kuota</th>
						<th for="basicinput">Status Penerimaan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<th><input type="text" id="basicinput" name="penerimaan" placeholder="Penerimaan" class="form-control"></th>
					<th><input type="text" id="basicinput" name="kuota" placeholder="Kuota penerimaan" class="form-control"></th>
					<th>
						<div class="control-group">
							<div class="controls">
								<input type="radio" id="basicinput" name="status" value="1" checked> Aktif
							</div>
							<div class="controls">
								<input type="radio" id="basicinput" name="status" value="0"> Tidak Aktif
							</div>
						</div>
					</th>
					<th>
												<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn">Simpan</button> <a class='btn' href='?menu=penerimaan'>Selesai</a> 
							</div>
						</div>
					</th>
				<?php
					if(isset($_POST['submit'])){
						$penerimaan = $_POST['penerimaan'];
						$kuota = $_POST['kuota'];
						$status = $_POST['status'];

						$qry = $lowongan->InsertData($penerimaan, $kuota, $status);

						if($qry){
							echo "<script language='javascript'>alert('Data berhasil disimpan'); document.location='?menu=penerimaan&aksi=tambah'</script>";
						}else{
							echo "<script language='javascript'>alert('Gagal'); document.location='?menu=penerimaan'</script>";
						}
					}
				?>
					</tbody>
				</form>
			</table>
		</div>
				</div>
			</div>
		</table>
	</div>
</div>
</div>
</div>
</section>
		<?php
		
		}else if($_GET['aksi']=="edit"){
			/*----------------------------------
			------------------------------------
			------------------------------------
			------------------------------------
			Ketika user ingin mengedit data
			------------------------------------
			------------------------------------
			------------------------------------
			----------------------------------*/
			?>

			<section class="content-header">
			  <h1>
			    <i class="fa fa-folder-o icon-title"></i> Input/Edit Penerimaan Baru
			  </h1>
			</section>
			<?php

			if(isset($_POST['submit'])){
				$id_penerimaan = $_POST['id_penerimaan'];
				$penerimaan = $_POST['penerimaan'];
				$kuota = $_POST['kuota'];
				$status = $_POST['status'];

				$qry = $lowongan->EditData($penerimaan, $kuota, $status, $id_penerimaan);

				if($qry){
					echo "<script language='javascript'>alert('Data berhasil diedit'); document.location='?menu=penerimaan'</script>";
				}else{
					echo "<script language='javascript'>alert('Gagal'); document.location='?menu=penerimaan'</script>";
				}
			}

			if(isset($_GET['id_lowongan'])){
				$id_lowongan = $_GET['id_lowongan'];
				$get = $lowongan->GetData("where id_lowongan = '$id_lowongan'");
				$data = $get->fetch();

				?>
			<section class="content">
			  <div class="row">
			    <div class="col-md-12">	
				  <div class="box box-primary">
			        <div class="box-body">
					<h3></h3>
			          <!-- tampilan tabel obat -->
			          <table class="table table-bordered table-striped table-hover">
					<form class="form-horizontal row-fluid" action="" method="post">
			            <!-- tampilan tabel header -->
			            <thead> 
			            <tr>
						<th for="basicinput">Penerimaan</th>
						<th for="basicinput">Kuota</th>
						<th for="basicinput">Status Penerimaan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<th><input type="hidden" name="id_penerimaan" <?php echo "value='$id_lowongan'"; ?>>
						<input type="text" id="basicinput" name="penerimaan" placeholder="Penerimaan" class="form-control" <?php echo "value='$data[lowongan]'"; ?>></th>
					<th><input type="text" id="basicinput" name="kuota" placeholder="Kuota penerimaan" class="form-control" <?php echo "value='$data[kuota]'"; ?>></th>
					<th>
						<div class="control-group">
							<label class="control-label" for="basicinput">Status Penerimaan</label>
							<?php
								if($data['status']=="1"){
									?>
									<div class="controls">
										<input type="radio" id="basicinput" name="status" value="1" checked> Aktif
									</div>
									<div class="controls">
										<input type="radio" id="basicinput" name="status" value="0"> Tidak Aktif
									</div>
									<?php
								}else if($data['status']=="0"){
									?>
									<div class="controls">
										<input type="radio" id="basicinput" name="status" value="1"> Aktif
									</div>
									<div class="controls">
										<input type="radio" id="basicinput" name="status" value="0" checked> Tidak Aktif
									</div>
									<?php
								}
							?>
							
						</div>
					</th>
					<th>
							<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn">Simpan</button> <a class='btn' href='?menu=penerimaan'>Selesai</a> 
							</div>
						</div>
					</th>
				<?php

			}else{
				print "Pilih penerimaan terlebih dahulu";
			}

			?>
							</div>
						</div>
					</tbody>
				</form>
			</table>
			</div>
			</div>
			</div>
			</div>
			</section>
			<?php

		}else if($_GET['aksi']=="hapus"){
			/*----------------------------------
			------------------------------------
			------------------------------------
			------------------------------------
			Ketika user ingin menghapus data
			------------------------------------
			------------------------------------
			------------------------------------
			----------------------------------*/
			if(isset($_GET['id_lowongan'])){
				$id_lowongan = $_GET['id_lowongan'];
				$qry = $lowongan->HapusData($id_lowongan);

				if($qry){
					echo "<script language='javascript'>alert('Data berhasil dihapus'); document.location='?menu=penerimaan'</script>";
				}else{
					echo "<script language='javascript'>alert('Gagal'); document.location='?menu=penerimaan'</script>";
				}
			}else{
				print "Pilih penerimaan terlebih dahulu";
			}
		}

	}else if(isset($_GET['kriteria'])){

		$lowongan_rinci = new LowonganRinci();

		$id_lowongan = $_GET['kriteria'];
		$sql = $lowongan->GetData("where id_lowongan='$id_lowongan'");
		$pen = $sql->fetch();

		if(isset($_GET['kriteria_aksi'])){

			if($_GET['kriteria_aksi']=="tambah"){
				if(isset($_POST['submit'])){
					$id_penerimaan = $_POST['id_penerimaan'];
					$kriteria = $_POST['kriteria'];
					$bobot = $_POST['bobot'];
					$nilai = $_POST['nilai'];
					if($nilai=="0") $bobot = "0";
					$upload = $_POST['upload'];

					$qry = $lowongan_rinci->InsertData($id_penerimaan, $kriteria, $bobot, $nilai, $upload);

					if($qry){
						echo "<script language='javascript'>alert('Data berhasil disimpan'); document.location='?menu=penerimaan&kriteria=$id_lowongan&kriteria_aksi=tambah'</script>";
					}else{
						echo "<script language='javacsript'>alert('Gagal'); document.location='?menu=penerimaan&kriteria=$id_lowongan'";
					}
				}
			?>

			<section class="content-header">
			  <h1>
			    <i class="fa fa-folder-o icon-title"></i> Tambah Kriteria <?php echo $pen['lowongan'];?>
			  </h1>
			</section>
			<section class="content">
			  <div class="row">
			    <div class="col-md-12">	
				  <div class="box box-primary">
			        <div class="box-body">
					<h3></h3>
			          <!-- tampilan tabel obat -->
			          <table class="table table-bordered table-striped table-hover">
					<form class="form-horizontal row-fluid" action="" method="post">
			            <!-- tampilan tabel header -->
			            <thead> 
			            <tr>
						<th for="basicinput">Kriteria</th>
						<th for="basicinput">Bobot</th>
						<th for="basicinput">Inputan Nilai</th>
						<th for="basicinput">Upload File</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<th>
						<input type="hidden" name="id_penerimaan" <?php echo "value='$id_lowongan'"; ?>>
						<input type="text" id="basicinput" name="kriteria" placeholder="Input nama kriteria" class="form-control">
					</th>
					<th>
						<input type="text" id="basicinput" name="bobot" placeholder="Input bobot kriteria" class="form-control">
					</th>
					<th>
						<div class="controls">
						<input type="radio" id="basicinput" name="nilai" value="1" checked> Ada
						</div>
						<div class="controls">
						<input type="radio" id="basicinput" name="nilai" value="0"> Tidak Ada
						</div>
						<div class="controls">
							<span class="help-inline"><i>Aktifkan jika kriteria memiliki unsur penilaian</i></span>
						</div>
					</th>
					<th>
							<div class="controls">
								<input type="radio" id="basicinput" name="upload" value="1" checked> Ada
							</div>
							<div class="controls">
								<input type="radio" id="basicinput" name="upload" value="0"> Tidak Ada
							</div>
							<div class="controls">
								<span class="help-inline"><i>Aktifkan jika kriteria memerlukan file lampiran</i></span>
							</div>
					</th>
					<th>
							<div class="controls">
								<button type="submit" name="submit" class="btn">Simpan</button> <?php echo "<a class='btn' href='?menu=penerimaan&kriteria=$id_lowongan'>Selesai</a>"; ?>
					</th>
							</div>
								</div>
							</form>
						</th>
					</tbody>
			</table>
		</div>
		</div>
		</div>
		</div>
		</section>

			<?php

			}else if($_GET['kriteria_aksi']=="edit"){

				$id_lowongan_rinci = $_GET['id_lowongan_rinci'];
				$getRow = $lowongan_rinci->GetData("where id_lowongan_rinci = '$id_lowongan_rinci'");
				$rowLow = $getRow->fetch();

				if(isset($_POST['submit'])){
					$id_lowongan_rinci = $_POST['id_lowongan_rinci'];
					$kriteria = $_POST['kriteria'];
					$bobot = $_POST['bobot'];
					$nilai = $_POST['nilai'];
					if($nilai=="0") $bobot = "0";
					$upload = $_POST['upload'];

					$qry = $lowongan_rinci->EditData($kriteria, $bobot, $nilai, $upload, $id_lowongan_rinci);

					if($qry){
						echo "<script language='javascript'>alert('Data berhasil diedit'); document.location='?menu=penerimaan&kriteria=$id_lowongan'</script>";
					}else{
						echo "<script language='javascript'>alert('Gagal'); document.location='?menu=penerimaan&kriteria=$id_lowongan'</script>";
					}
				}

				?>


<!--------------------------------------------------->

			<section class="content-header">
			  <h1>
			    <i class="fa fa-folder-o icon-title"></i> Edit Kriteria <?php echo $pen['lowongan'];?>
			  </h1>
			</section>
			<section class="content">
			  <div class="row">
			    <div class="col-md-12">	
				  <div class="box box-primary">
			        <div class="box-body">
					<h3></h3>
			          <!-- tampilan tabel obat -->
			          <table class="table table-bordered table-striped table-hover">
					<form class="form-horizontal row-fluid" action="" method="post">
			            <!-- tampilan tabel header -->
			            <thead> 
			            <tr>
						<th for="basicinput">Kriteria</th>
						<th for="basicinput">Bobot</th>
						<th for="basicinput">Inputan Nilai</th>
						<th for="basicinput">Upload File</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<th>
						<div class="controls">
							<input type="hidden" name="id_lowongan_rinci" <?php echo "value='$id_lowongan_rinci'"; ?>>
							<input type="text" id="basicinput" name="kriteria" placeholder="Input nama kriteria" class="form-control" <?php echo "value = '$rowLow[kriteria]'"; ?>>
						</div>
					</th>
					<th>
						<div class="controls">
							<input type="text" id="basicinput" name="bobot" placeholder="Input bobot kriteria" class="form-control" <?php echo "value = '$rowLow[bobot]'"; ?>>
						</div>
					</th>
					<th>
							<?php
								if($rowLow['status_nilai']=="1"){
									?>
									<div class="controls">
										<input type="radio" id="basicinput" name="nilai" value="1" checked> Ada
									</div>
									<div class="controls">
										<input type="radio" id="basicinput" name="nilai" value="0"> Tidak Ada
									</div>
									<?php
								}else if($rowLow['status_nilai']=="0"){
									?>
									<div class="controls">
										<input type="radio" id="basicinput" name="nilai" value="1"> Ada
									</div>
									<div class="controls">
										<input type="radio" id="basicinput" name="nilai" value="0" checked> Tidak Ada
									</div>
									<?php
								}
							?>
							<div class="controls">
								<span class="help-inline"><i>Aktifkan jika kriteria memiliki unsur penilaian</i></span>
							</div>
					</th>
					<th>
							<?php
								if($rowLow['status_upload']=="1"){
									?>
									<div class="controls">
										<input type="radio" id="basicinput" name="upload" value="1" checked> Ada
									</div>
									<div class="controls">
										<input type="radio" id="basicinput" name="upload" value="0"> Tidak Ada
									</div>
									<?php
								}else if($rowLow['status_upload']=="0"){
									?>
									<div class="controls">
										<input type="radio" id="basicinput" name="upload" value="1"> Ada
									</div>
									<div class="controls">
										<input type="radio" id="basicinput" name="upload" value="0" checked> Tidak Ada
									</div>
									<?php
								}
							?>
					</th>
					<th>
						<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn">Simpan</button>
							</div>
						</div>
					</th>
							</div>
								</div>
							</form>
						</th>
					</tbody>
			</table>
		</div>
		</div>
		</div>
		</div>
		</section>

				<?php

			}else if($_GET['kriteria_aksi']=="hapus"){
				$id_lowongan_rinci = $_GET['id_lowongan_rinci'];

				$qryL = $lowongan_rinci->GetData("where id_lowongan_rinci='$id_lowongan_rinci'");
				$lamar = $qryL->fetch();

				$qry = $lowongan_rinci->HapusData($id_lowongan_rinci);

				if($qry){
					$qryHapusL = $lowongan_rinci->HapusKriteriaLamaran($lamar['id_lowongan'], $lamar['kriteria']);

					echo "<script language='javascript'> alert('Data berhasil dihapus'); document.location='?menu=penerimaan&kriteria=$id_lowongan'</script>";
				}else{
					echo "<script language='javascript'> alert('Gagal'); document.location='?menu=penerimaan&kriteria=$id_lowongan'</script>";
				}
			}

		}else{
		/*----------------------------------
		------------------------------------
		------------------------------------
		------------------------------------
		Ketika user ingin menampilkan kriteria
		------------------------------------
		------------------------------------
		------------------------------------
		----------------------------------*/
		$get = $lowongan->GetData("where id_lowongan = '$id_lowongan'");
		$row = $get->fetch();
		?>

<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Kriteria <?php echo $row['lowongan']; echo "<a class='btn btn-primary btn-social pull-right' href='?menu=penerimaan&kriteria=$id_lowongan&kriteria_aksi=tambah' title='Tambah Data' data-toggle='tooltip'>
      <i class='fa fa-plus'></i>Tambah</a>"?>
  </h1>
<section class="content">
  <div class="row">
    <div class="col-md-12">	
	  <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
					<tr>
						<th>No.</th>
						<th>Kriteria</th>
						<th>Bobot</th>
						<th>@Nilai</th>
						<th>@Upload</th>
						<th><center>Aksi</center></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					$getData = $lowongan_rinci->GetDataLowongan($id_lowongan);

					while($data = $getData->fetch()){

						if($data['status_nilai']=="1"){
							$ni = "<i class='fa fa-star'></i> ";
						}else{
							$ni = "";
						}

						if($data['status_upload']=="1"){
							$up = "<i class='fa fa-star'></i> ";
						}else{
							$up = "";
						}

						echo "<tr>
							<td class ='center' width = 7%>$no</td>
							<td class ='center' width = 48%>$data[kriteria]</td>
							<td class ='center' width = 10%>$data[bobot]</td>
							<td class ='center' width = 10%>$ni</td>
							<td class ='center' width = 10%>$up</td>";

						echo "<td width = 15%>
							<a class='btn btn-small btn-warning' href='?menu=penerimaan&kriteria=$data[id_lowongan]&kriteria_aksi=edit&id_lowongan_rinci=$data[id_lowongan_rinci]'>Edit</a>
							<a class='btn btn-small btn-danger' href='?menu=penerimaan&kriteria=$data[id_lowongan]&kriteria_aksi=hapus&id_lowongan_rinci=$data[id_lowongan_rinci]'>Hapus</a>
							</td>";
						echo "</tr>";

						$no++;
					}
					//$up = mysql_query("update gtp_peserta set approve = '1' where approve = '0'");
				?>
				</tbody>
			</table>
		</div>
		</div>
		<?php
		}
	}else{

		/*----------------------------------
		------------------------------------
		------------------------------------
		------------------------------------
		Ketika user hanya menampilkan data
		------------------------------------
		------------------------------------
		------------------------------------
		----------------------------------*/

		?>

<!-- Main content -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Penerimaan

    <a class="btn btn-primary btn-social pull-right" href="?menu=penerimaan&aksi=tambah" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">	
	  <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
					<tr>
						<th>No.</th>
						<th>Penerimaan</th>
						<th>Kuota</th>
						<th>Status</th>
						<th>Aksi</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					$getData = $lowongan->GetData("");

					while($data = $getData->fetch()){

						if($data['status']=="1"){
							$ic = "<i class='fa fa-check'></i> ";
						}else{
							$ic = "<i class='fa fa-close'></i> ";
						}

						echo "<tr>
							<td class='center' width = 7%>$no</td>
							<td class='center' width = 50%>$data[lowongan]</td>
							<td class='center' width = 10%>$data[kuota]</td>
							<td class='center' width = 8%>$ic</td>";

						echo "<td class='center' width = 15%>
							<a class='btn btn-small btn-warning' href='?menu=penerimaan&aksi=edit&id_lowongan=$data[id_lowongan]'>Edit</a>
							<a class='btn btn-small btn-danger' href='?menu=penerimaan&aksi=hapus&id_lowongan=$data[id_lowongan]'>Hapus</a>
							</td>";

						echo "<td class='center' width=10%>
						<a class='btn btn-small btn-inverse' href='?menu=penerimaan&kriteria=$data[id_lowongan]'>Kriteria</a></td>";

						echo "</tr>";

						$no++;
					}
					//$up = mysql_query("update gtp_peserta set approve = '1' where approve = '0'");
				?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
</section>
	<?php
	}
?>
	</div>
</div>