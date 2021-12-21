<?php
session_start();
include "include/koneksi.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
	$user = new User();
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$secret_key = "6LcUEIAdAAAAAFrIwa-v-AcY7NiigfflCDo5gzUO";
	$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response']);
	$response = json_decode($verify);
	if ($response->success) {
		if ($username) {
			$cek = $user->LoginUser($username, $password);
			if ($cek->rowCount() > 0) {
				$row = $cek->fetch();
				$_SESSION['user'] = $row['id_user'];
				$_SESSION['name'] = $row['nama_lengkap'];
				header('location:user/index.php');
			} else {
				header('location:index.php?pesan=salah');
			}
		}
	} else {
		header('location:index.php?pesan=chaptca');
	}
}
// session_start();
// include "include/koneksi.php";

// if(isset($_POST['username']) && isset($_POST['password'])){

// 	$user = new User();

// 	$username = $_POST['username'];
// 	$password = md5($_POST['password']);

// 	$qry = $user->LoginUser($username, $password);

// 	if($qry->rowCount() > 0){
// 		$row = $qry->fetch();
// 		$_SESSION['user'] = $row['id_user'];
// 		$_SESSION['name'] = $row['nama_lengkap'];
// 		echo "<script language='javascript'>alert('Login Berhasil');document.location='index.php'</script>";
// 	}else{
// 		echo "<script language='javascript'>alert('Login Gagal');document.location='index.php'</script>";
// 	}

// }

?>
