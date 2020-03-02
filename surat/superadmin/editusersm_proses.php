<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $NIP = $_POST['NIP'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $username_usersm = $_POST['username_usersm'];
    $password_usersm = $_POST['password_usersm'];

  $query = "UPDATE user_sm SET NIP='$NIP', nama_pegawai='$nama_pegawai', no_hp='$no_hp', alamat='$alamat', username_usersm='$username_usersm', password_usersm='$password_usersm' WHERE user_sm.NIP='$NIP'";

  $result = mysqli_query($mysqli, $query);

  if(!$result){
    echo 'Data berhasil di simpan! '; 
    echo '<a href="halamanusersm.php?NIP='.$NIP.'"> Kembali</a>';
    
  }else{
    echo 'Gagal menyimpan data! ';
    echo '<a href="editusersm.php?NIP='.$NIP.'"> Kembali</a>';
    
  }
}

//lakukan redirect ke halaman halamanusersm.php
header("location:halamanusersm.php");

?>