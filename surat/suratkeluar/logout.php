<h2>Halaman Logout</h2>
<?php
	session_destroy();
	echo "<script>alert('anda telah logout');</script>";
	echo "<script>location='login.php';</script>";
?>