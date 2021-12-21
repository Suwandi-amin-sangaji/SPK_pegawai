<html>
 <head>
 <style type="text/css">
 .head
 {
 margin-left:30em;
 margin-top:10em;
 margin-right:25em;
 padding-left:-10pt;
 padding-top:10pt;
 background:#529abb;
 height:5em;
 border-radius:10px 10px 0px 0px;
 }
 #body
 {
 padding-left:18pt;
 padding-top:19pt;
 margin-left:30em;
 margin-right:25em;
 padding-left:15pt;
 background:#ebebeb;
 height:10em;
 border: 1px;
 border-radius:0px 0px 10px 10px;
 }

 .print{
 	align-self: center;
 	padding-top: 30pt;
 }
 </style>
 </head>
 <body>
 
 
 <div class="head">
 <?php
 include "include/koneksi.php";
 $user = new User();
 $id_user = $_GET['id_user'];
 $qry = $user->GetData("where id_user = '$id_user'");
 $row = $qry->fetch();
 echo "
 <table border='0'align='center'>
 <tr><td><img src='img/logo.png'width='300'height='70'/></td><td style='padding-left:1pt'><h4>KARTU PESERTA</h4></td></tr>
 </table>"
 ?>
 </div>
 <div id="body">
 <?php
 echo "<form name='octav'>
 <table border='0' align='left'>
 <tr><td rowspan='10'><img src='upload/$row[foto]' width='125'height='125'></td></tr>
  <tr><td style='padding-left:8pt'><b>Id</td><td><b>:</td><td><b>$row[id_user]</td></tr>
 <tr><td style='padding-left:8pt'><b>Nama</td><td><b>:</td><td><b>$row[nama_lengkap]</td></tr>
 <tr><td style='padding-left:8pt'><b>Alamat</td><td><b>:</td><td><b>$row[alamat]</td></tr>
 <tr><td style='padding-left:8pt'>Tempat Lahir</td><td>:</td><td>$row[tempat_lahir]</td></tr>
 <tr><td style='padding-left:8pt'>Tanggal Lahir</td><td>:</td><td>$row[tanggal_lahir]</td></tr>
 <tr><td style='padding-left:8pt'>Pendidikan</td><td>:</td><td>$row[pendidikan]</td></tr>
 </form>
 "
 ?>

 </div>


 </body>



 <script>
window.load = print_d();
  function print_d(){  
   window.print();  
  }  
</script>
</html>