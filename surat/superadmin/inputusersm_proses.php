<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// mengecek apakah tombol input dari form telah diklik
if (isset($_POST['simpan'])) {

	// membuat variabel untuk menampung data dari form
  
  $NIP = $_POST['NIP'];
  $nama_pegawai = $_POST['nama_pegawai'];
  $no_hp = $_POST['no_hp'];
  $alamat = $_POST['alamat'];
  $username_usersm = $_POST['username_usersm'];
  $password_usersm = $_POST['password_usersm'];
  $pw_crypt = md5($password_usersm);

  $data = mysqli_query($mysqli,"INSERT INTO user_sm SET NIP='$NIP', 
  nama_pegawai='$nama_pegawai', no_hp='$no_hp', alamat='$alamat', 
  username_usersm='$username_usersm', password_usersm='$pw_crypt', id_status='2'") 
  or die ("data salah : ".mysqli_error($mysqli));

  if(!$result){
    echo 'Data berhasil di simpan! '; 
    echo '<a href="halamanusersm.php?id='.$id.'"> Kembali</a>';
    
  }else{
    echo 'Gagal menyimpan data! ';
    echo '<a href="inputusersm.php?id='.$id.'"> Kembali</a>';
    
  }
}

// melakukan redirect (mengalihkan) ke halaman halamanusersm.php
header("location:halamanusersm.php");
?>