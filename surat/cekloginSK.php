<?php
ini_set("display_errors", 0);
session_start(); //memulai session
include "koneksi.php";
$username_usersk = $_POST['username_usersk'];//mengambil isian username dan password dari form
$password_usersk = $_POST['password_usersk'];

//query untuk mengambil data user dari database sesuai dengan username inputan form
$pw_md5 = md5($password_usersk);
$q = "SELECT * FROM user_sk WHERE username_usersk = '$username_usersk' && password_usersk = '$pw_md5' " ;
$result = mysqli_query($mysqli,$q);
$data = mysqli_fetch_array($result);
$cek = mysqli_num_rows($result);
//cek kesesuaian password masukan dengan database
if($cek == 1)
	{
		//menyimpan tipe user dan username dalam session
		$_SESSION['username_usersk'] = $data['username_usersk'];
		header("Location:suratkeluar/index.php");
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
