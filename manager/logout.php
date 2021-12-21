<?php
	session_start();
	unset($_SESSION['manager']);	
	echo "<script>alert('Logout Success ');document.location='index.php' </script> ";	
?>