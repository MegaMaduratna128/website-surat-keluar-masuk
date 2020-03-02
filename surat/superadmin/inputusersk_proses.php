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
  $username_usersk = $_POST['username_usersk'];
  $password_usersk = $_POST['password_usersk'];
  $pw_crypt = md5($password_usersk);

  $data = mysqli_query($mysqli,"INSERT INTO user_sk SET NIP='$NIP', nama_pegawai='$nama_pegawai', 
  no_hp='$no_hp', alamat='$alamat', username_usersk='$username_usersk', password_usersk='$pw_crypt', id_status='3'") 
  or die ("data salah : ".mysqli_error($mysqli));

  if(!$result){
    echo 'Data berhasil di simpan! '; 
    echo '<a href="halamanusersk.php?id='.$id.'"> Kembali</a>';
    
  }else{
    echo 'Gagal menyimpan data! ';
    echo '<a href="inputusersk.php?id='.$id.'"> Kembali</a>';   
  }
}
// melakukan redirect (mengalihkan) ke halaman halamanusersk.php
header("location:halamanusersk.php");
?>
