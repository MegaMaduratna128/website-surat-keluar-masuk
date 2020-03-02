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
    $username_usersk = $_POST['username_usersk'];
    $password_usersk = $_POST['password_usersk'];

  $query = "UPDATE user_sk SET NIP='$NIP', nama_pegawai='$nama_pegawai', 
  no_hp='$no_hp', alamat='$alamat', username_usersk='$username_usersk', 
  password_usersk='$password_usersk' WHERE NIP='$NIP'";

  $result = mysqli_query($mysqli, $query);

  if(!$result){
    echo 'Data berhasil di simpan! '; 
    echo '<a href="halamanusersk.php?NIP='.$NIP.'"> Kembali</a>';
    
  }else{
    echo 'Gagal menyimpan data! ';
    echo '<a href="editusersk.php?id='.$NIP.'"> Kembali</a>';
    
  }
}
//lakukan redirect ke halaman halamanusersk.php
header("location:halamanusersk.php");
?>
