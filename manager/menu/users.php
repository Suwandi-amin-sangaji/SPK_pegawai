<section class="content-header">
  <h1>
    <i class="fa fa-user"></i> Data User
  </h1>
<?php
	$user = new User();
	include "../include/fungsi_tanggal.php";

	/*----------------------------------
	------------------------------------
	------------------------------------
	------------------------------------
	Ketika user melakukan input data
	------------------------------------
	------------------------------------
	------------------------------------
	----------------------------------*/

	if(isset($_GET['detail'])){

			$id_user = $_GET['detail'];
			$qr_nama = $user->GetData("where id_user = '$id_user'");
			$nama = $qr_nama->fetch();
			?>
<!---------------------------------->
<section class="content">
  <div class="row">
    <div class="col-md-12">	
	  <div class="box box-primary">
        <div class="box-body">
        	<h3>Detail User -- <?php echo $nama['nama_lengkap']; ?></h3>
          <!-- tampilan tabel obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
				</thead>
				<tbody>
				<?php
					$qr = $user->GetData("where id_user = '$id_user'");		
					while($data = $qr->fetch()){
						$tglLahir = tgl_indo($data['tanggal_lahir']);
						echo "<tr>
							<td width = 20%>Nama Lengkap </td> <td width = 1%>:</td> <td width = 2079%>$data[nama_lengkap]</td>
							</tr>";
						echo "<tr>
							<td width = 20%>Alamat </td> <td width = 1%>:</td> <td width = 2079%>$data[alamat]</td>
							</tr>";
						echo "<tr>
							<td width = 20%>Tempat, Tanggal Lahir </td> <td width = 1%>:</td> <td width = 2079%>$data[tempat_lahir], $tglLahir</td>
							</tr>";
						echo "<tr>
							<td width = 20%>No HP </td> <td width = 1%>:</td> <td width = 2079%>$data[no_hp]</td>
							</tr>";
						echo "<tr>
							<td width = 20%>Email </td> <td width = 1%>:</td> <td width = 2079%>$data[email]</td>
							</tr>";
						echo "<tr>
							<td width = 20%>Pendidikan </td> <td width = 1%>:</td> <td width = 2079%>$data[pendidikan]</td>
							</tr>";
						echo "<tr>
							<td width = 20%>File CV </td> <td width = 1%>:</td> <td width = 2079%><a href='../upload/$data[file_cv]' target='blank'>$data[file_cv]</a></td>
							</tr>";
					}
				?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
</section>
<!---------------------------------->

		<?php

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
<!------------------>
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
						<th>Nama Lengkap</th>
						<th>Pendidikan</th>
						<th>No HP</th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					$getData = $user->GetData("");

					while($data = $getData->fetch()){
						echo "<tr>
							<td width = 5%>$no</td>
							<td width = 22%>$data[nama_lengkap]</td>
							<td width = 28%>$data[pendidikan]</td>
							<td width = 18%>$data[no_hp]</td>
							<td width = 18%>$data[email]</td>";
						echo "<td width = 22%> <a class='btn btn-small btn-success' href='?menu=users&detail=$data[id_user]'>Detail</a></td>";
							// echo "<td width = 22%> <a class='btn btn-small btn-success' href='?ap=peserta&aksi=detail&id_peserta=$data[id_peserta]'>Detail</a> <a class='btn btn-small btn-danger' href='application/peserta/peserta_hapus.php?id_peserta=$data[id_peserta]&nama_peserta=$data[nama_lengkap]&lomba=$data[nama_lomba]'>Hapus</a> 
							// <a class='btn btn-small btn-info' href='?ap=peserta&aksi=edit&id_peserta=$data[id_peserta]'>Edit</a>
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
<!------------------>

	<?php
	}
?>
	</div>
</div>