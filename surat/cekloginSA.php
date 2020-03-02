<?php
	ini_set("display_errors", 0);
	session_start(); //memulai session
	include "koneksi.php";
	$username_admin = $_POST['username_admin'];//mengambil isian username dan password dari form
	$password_admin = $_POST['password_admin'];

	//query untuk mengambil data user dari database sesuai dengan username inputan form
	$q = "SELECT * FROM super_admin WHERE username_admin = '$username_admin' && password_admin = '$password_admin'" ;
	$result = mysqli_query($mysqli,$q);
	$data = mysqli_fetch_array($result);
	$cek = mysqli_num_rows($result);

	//cek kesesuaian password masukan dengan database
	if($cek == 1)
		{
			//menyimpan tipe user dan username dalam session
			$_SESSION['username_admin'] = $data['username_admin'];
			$_SESSION['password_admin'] = $data['password_admin'];
			header("Location:superadmin/index.php");
		}
	//jika password tidak sesuai
	else 
		{
		echo "
        <script type='text/javascript'>
        alert('Username & Password Anda Salah!');
        history.back(self);
        </script>";
		}
?>
