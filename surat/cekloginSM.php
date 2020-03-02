<?php
ini_set("display_errors", 0);
session_start(); //memulai session
include "koneksi.php";
$username_usersm = $_POST['username_usersm'];
$password_usersm  = $_POST['password_usersm'];

//query untuk mengambil data user dari database sesuai dengan username inputan form
$pw_md5 = md5($password_usersm);
$q = "SELECT * FROM user_sm WHERE username_usersm  = '$username_usersm' && password_usersm = '$pw_md5' " ;
$result = mysqli_query($mysqli,$q);
$data = mysqli_fetch_array($result);
$cek = mysqli_num_rows($result);
//cek kesesuaian password masukan dengan database
if($cek == 1)
	{
		//menyimpan tipe user dan username dalam session
		$_SESSION['username_usersm'] = $data['username_usersm'];
		header("Location:suratmasuk/index.php");
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
